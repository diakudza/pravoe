<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->text(200),
            'user_id' => User::all()->random()->id,
            'status' => $this->faker->randomElement(['inwork', 'new', 'completed']),
            'category_id' => Category::all()->random()->id,
            'created_at' => $this->faker
                ->dateTimeBetween('-1 years')
                ->format('Y-m-d'),
        ];
    }
}
