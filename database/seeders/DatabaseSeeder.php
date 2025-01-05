<?php

namespace Database\Seeders;

use App\Models\Listing;
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
            'firstname' => 'Chris',
            'lastname' => 'Michel',
            'email' => 'christopherw.michel@gmail.com',
            'is_admin' => true,
        ],
        );
        User::factory()->create([
            'firstname' => 'Andy',
            'lastname' => 'Anderson',
            'email' => 'andy@email.com',
        ]);

        User::factory()->create([
            'firstname' => 'Brian',
            'lastname' => 'Buller',
            'email' => 'brian@email.com',
        ]);

        Listing::factory(10)->create([
            'by_user_id' => 2,
        ]);
        Listing::factory(10)->create([
            'by_user_id' => 3,
        ]);
    }
}
