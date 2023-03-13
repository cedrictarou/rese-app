<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_date = Carbon::tomorrow();
        $end_date = Carbon::now()->addMonth();

        $start_time = Carbon::createFromTime(12, 0, 0);

        $datetime = $this->faker->dateTimeBetween($start_date, $end_date);

        $resavation = Carbon::instance($datetime)->setTimeFrom($start_time);

        if ($resavation->lessThan($datetime)) {
            $resavation = $resavation->addDay();
        }

        return [
            'date_time' => $resavation,
            'num_of_people' => $this->faker->numberBetween($min = 1, $max = 10),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'shop_id' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}
