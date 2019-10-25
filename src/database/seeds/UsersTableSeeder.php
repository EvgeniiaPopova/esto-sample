<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            ['name' => 'Admin'],
            ['email' => 'admin@esto.ee', 'permissions' => true]
        );
    
        factory(User::class, 10)->create();
    }
}
