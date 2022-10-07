<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ads>
 */
class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'domain_id' => 1,
            'imperssions' => $this->faker->randomFloat(0,10),
            'clicks' => $this->faker->randomFloat(0,10),
            'revenue' => $this->faker->randomFloat(0,10),
            'eCPM' => $this->faker->randomFloat(0,10), 
        ];
    }
}
