<?php
namespace App\Actions\Jetstream;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Contracts\InvitesTeamMembers;
use Laravel\Jetstream\Events\InvitingTeamMember;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Mail\TeamInvitation;
use Laravel\Jetstream\Rules\Role;

class InviteTeamMember implements InvitesTeamMembers
{
/**
* Invite a new team member to the given team.
*/
public function invite(User $user, Team $team, string $email, ?string $role = null): void
{
Gate::forUser($user)->authorize('addTeamMember', $team);

$this->validate($team, $email, $role);

InvitingTeamMember::dispatch($team, $email, $role);

// Create the invitation and explicitly resolve it as a TeamInvitation instance.
$invitation = Jetstream::teamInvitationModel()::query()
->whereKey(
$team->teamInvitations()->create([
'email' => $email,
'role' => $role,
])->getKey()
)->firstOrFail();

Mail::to($email)->send(new TeamInvitation($invitation));
}

/**
* Validate the invite member operation.
*/
protected function validate(Team $team, string $email, ?string $role): void
{
Validator::make([
'email' => $email,
'role' => $role,
], $this->rules($team), [
'email.unique' => __('This user has already been invited to the team.'),
])->validateWithBag('addTeamMember');
}

/**
* Get the validation rules for inviting a team member.
*
* @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
*/
protected function rules(Team $team): array
{
return [
'email' => [
'required', 'email',
Rule::unique(Jetstream::teamInvitationModel())->where('team_id', $team->id),
],
'role' => Jetstream::hasRoles() ? ['required', 'string', new Role] : [],
];
}
}
