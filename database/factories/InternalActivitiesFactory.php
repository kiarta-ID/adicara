<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InternalActivitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kegiatan' => $this->faker->words(3, true),
            'deskripsi_kegiatan' => $this->faker->paragraphs(2, true),
            'tanggal_mulai' => $this->faker->dateTime(),
            'tanggal_selesai' => $this->faker->dateTime(),
            'event_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
