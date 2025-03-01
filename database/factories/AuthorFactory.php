<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class AuthorFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
