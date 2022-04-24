<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_jabatan' => $this->faker->words(3, true),
            'jumlah_maksimum' => $this->faker->randomDigitNotNull(),
            'event_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
