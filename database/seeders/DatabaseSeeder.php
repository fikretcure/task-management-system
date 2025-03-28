<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'Kullanici 1',
            'email' => 'kullanici1@example.com',
        ]);

        User::factory()->create([
            'name' => 'Kullanici 2',
            'email' => 'kullanici2@example.com',
        ]);

        $this->call([
            TaskSeeder::class,
        ]);
    }
}
