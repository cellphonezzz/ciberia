<?php

namespace Database\Factories;

use App\Models\Author;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'author_id' => Author::get()->random()->id,
        ];
    }
}
