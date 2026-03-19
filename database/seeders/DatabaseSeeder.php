<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => bcrypt('12345678')
        ]);

        

        Todo::create([
            'name' => 'Belajar Laravel',
            'description' => 'Belajar Laravel dari awal sampai akhir',
            'user_id' => $user->id,
        ]);
       
        
    }
}
