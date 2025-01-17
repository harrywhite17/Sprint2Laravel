<?php

use App\Models\User;
use App\Models\Team;

if (!function_exists('create_default_user')) {
    function create_default_user()
    {
        $user = User::create([
            'name' => config('userdefaults.default_user.name'),
            'email' => config('userdefaults.default_user.email'),
            'password' => \Hash::make(config('userdefaults.default_user.password')),
        ]);

        $team = Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]);

        $user->current_team_id = $team->id;
        $user->save();

        return $user;
    }
}

if (!function_exists('create_default_teacher')) {
    function create_default_teacher()
    {
        $teacher = User::create([
            'name' => config('userdefaults.default_teacher.name'),
            'email' => config('userdefaults.default_teacher.email'),
            'password' => \Hash::make(config('userdefaults.default_teacher.password')),
        ]);

        $team = Team::forceCreate([
            'user_id' => $teacher->id,
            'name' => explode(' ', $teacher->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]);

        $teacher->current_team_id = $team->id;
        $teacher->save();

        return $teacher;
    }
}
