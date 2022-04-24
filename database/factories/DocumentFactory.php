<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokumen' => $this->faker->words(3, true),
            'url_dokumen' => 'https://media.neliti.com/media/publications/249244-none-837c3dfb.pdf',
            'internal_activity_id' => $this->faker->randomDigitNotNull(),
            'position_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
