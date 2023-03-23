<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id'
            => $this->faker->numberBetween(1, 6),
            'shop_id' =>
            $this->faker->numberBetween(1, 25),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph,
        ];
    }
}
