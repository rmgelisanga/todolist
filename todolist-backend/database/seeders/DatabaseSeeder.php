<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Project::insert([
            ['title' => 'E-Commerce Website'],
            ['title' => 'Websocket Updates'],
            ['title' => 'Angular Upgrade']
        ]);

        User::insert([
            ['username' => 'stuart'],
            ['username' => 'tyler'],
            ['username' => 'adam'],
            ['username' => 'lan']
        ]);

        Task::insert([
            ['project_id' => 1, 'user_id' => 3, 'task' => 'Product Pages', 'hours' => 5],
            ['project_id' => 1, 'user_id' => 2, 'task' => 'Shopping Cart', 'hours' => 10],
            ['project_id' => 1, 'user_id' => 3, 'task' => 'My Account', 'hours' => 5],
            ['project_id' => 2, 'user_id' => 1, 'task' => 'Add to Socket.IO', 'hours' => 2],
            ['project_id' => 2, 'user_id' => 1, 'task' => 'Enable Broadcasting', 'hours' => 5],
            ['project_id' => 2, 'user_id' => 1, 'task' => 'Adjust Interface', 'hours' => 3],
            ['project_id' => 3, 'user_id' => 4, 'task' => 'Upgrade Angular', 'hours' => 15],
            ['project_id' => 3, 'user_id' => 1, 'task' => 'Fix Broken Things', 'hours' => 10],
            ['project_id' => 3, 'user_id' => 4, 'task' => 'Test', 'hours' => 10]
        ]);
    }
}
