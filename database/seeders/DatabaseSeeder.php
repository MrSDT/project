<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        UserGroup::create(['groupName' => 'registered_user']);
        UserGroup::create(['groupName' => 'verified_user']);
        UserGroup::create(['groupName' => 'job_owner']);
        UserGroup::create(['groupName' => 'moderator']);
        UserGroup::create(['groupName' => 'administrator']);
        UserGroup::create(['groupName' => 'manager']);
    }
}
