<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Team;

class HelpersTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_default_user()
    {
        $user = create_default_user();

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(config('userdefaults.default_user.name'), $user->name);
        $this->assertEquals(config('userdefaults.default_user.email'), $user->email);
        $this->assertTrue(\Hash::check(config('userdefaults.default_user.password'), $user->password));
        $this->assertInstanceOf(Team::class, $user->currentTeam);
    }

    public function test_create_default_teacher()
    {
        $teacher = create_default_teacher();

        $this->assertInstanceOf(User::class, $teacher);
        $this->assertEquals(config('userdefaults.default_teacher.name'), $teacher->name);
        $this->assertEquals(config('userdefaults.default_teacher.email'), $teacher->email);
        $this->assertTrue(\Hash::check(config('userdefaults.default_teacher.password'), $teacher->password));
        $this->assertInstanceOf(Team::class, $teacher->currentTeam);
    }
}