<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->text(),
            'age' => $this->faker->numberBetween($min = 24, $max = 50),
            'title' => $this->faker->sentence(),
            'joining_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'number_of_courses' => $this->faker->numberBetween($min = 1, $max = 5),
            'salary' => $this->faker->numberBetween($min = 4000, $max = 10000),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
