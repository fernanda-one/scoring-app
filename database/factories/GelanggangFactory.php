<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GelanggangFactory extends Factory
{

    public function definition()
    {
        return [
            'Satu' => $this->faker->randomElement(['Semi-final','final','penyisihan','seperempat']),
            'sudut_merah' => $this->faker->name(),
            'sudut_biru' => $this->faker->name(),
            'kelas' => $this->faker->randomElement(['A','B','C','D','E','F']),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki','perempuan'])
        ];
    }
}
