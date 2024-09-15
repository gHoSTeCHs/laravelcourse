<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'career'=>fake()->jobTitle(),
            'employer_id'=>Employer::factory(),
            'salary'=>'$50,000'
        ];
    }
}
