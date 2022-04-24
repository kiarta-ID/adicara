<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_event' => $this->faker->text(),
            'deskripsi_event' => $this->faker->paragraphs(2,true),
            'slug' => $this->faker->uuid(),
            'user_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
