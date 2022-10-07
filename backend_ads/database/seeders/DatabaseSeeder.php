<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ads;
use App\Models\ContactForm;
use App\Models\Domain;
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
        // User::factory(5)->create();
        // Domain::factory(3)->create();
        Ads::factory(50)->create([
            'user_id' => 2,
            'domain_id' => 2
        ]);
        // ContactForm::factory(30)->create();
    }
}
