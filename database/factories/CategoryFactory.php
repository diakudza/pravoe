<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = [
            'Земельные споры',
            'Семейные споры',
            'Трудовые споры',
            'Споры с ГИБДД'
        ];
        $rand = $this->faker->unique()->randomElement($title);
        return [
            'title' => $rand,
            'slug' => Str::slug($rand, '-'),
        ];
    }
}
