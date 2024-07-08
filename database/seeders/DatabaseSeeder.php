<?php

namespace Database\Seeders;

use App\Models\listing;
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

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ]);

        listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // listing::create([
        //     'title' => 'Senior Developer',
        //     'tags' => 'Laravel, JavaScript',
        //     'company' => 'Acme Developer',
        //     'location' => 'Pampanga, Mexico City',
        //     'email' => 'Developer@gmail..com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'The only one who can tell you you cant win is you, and you dont have to listen.'

        // ]);
        // listing::create([
        //     'title' => 'Junior Developer',
        //     'tags' => 'Laravel, Vue Js',
        //     'company' => 'Yobad Corp',
        //     'location' => 'Quezon, Mexico City',
        //     'email' => 'juniorDeveloper@gmail..com',
        //     'website' => 'https://www.yobad.com',
        //     'description' => 'The only two who can tell you you cant win is you, and you dont have to listen.'

        // ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
