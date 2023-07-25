<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'contingent' => $this->faker->city(),
            'sparring_class' => $this->faker->randomElement(['A','B','C','D','E','F']),
            'gender' => $this->faker->randomElement(['laki-laki','perempuan'])
        ];
    }
}
