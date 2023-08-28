<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(0,1000),
            'nama_pertandingan' => $this->faker->randomElement(['Semi-final','final','penyisihan','seperempat']),
            'sudut_merah' => $this->faker->name(),
            'sudut_biru' => $this->faker->name(),
            'kelas' => $this->faker->randomElement(['A','B','C','D','E','F']),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki','perempuan'])
        ];
    }
}
