<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companyName = fake()->name();

        return [
            'name' => $companyName,
            'slug' => Str::slug($companyName),
            'document' => fake()->creditCardNumber(),
            'phone' => fake()->phoneNumber(),
            'start_at' => '09:00:00',
            'finish_at' => '19:00:00',
            'start_lunch_at' => '12:00:00',
            'finish_lunch_at' => '13:30:00',
        ];
    }
}
