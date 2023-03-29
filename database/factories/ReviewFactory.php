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
            => $this->faker->numberBetween(1, 5),
            'shop_id' =>
            $this->faker->numberBetween(1, 20),
            'reserve_id' =>
            $this->faker->numberBetween(1, 50),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->realText(100),
        ];
    }
}
