<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class AddUserTest extends TestCase
{
    public function testExample()
    {
        $this->be(\App\User::wherePermissions(true)->firstOrFail());
        $users = factory(User::class, 10)->raw();
    
        foreach ($users as $user) {
            $this->post(route('users.store'), $user)
                ->assertStatus(201)
                ->assertJson($user);
        }
    }
    
}
