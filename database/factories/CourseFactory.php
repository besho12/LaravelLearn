<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->sentence(),
            'number_of_hrs' => $this->faker->numberBetween($min = 2, $max = 100),
            'category' => $this->faker->sentence(),
            'academic_year' => $this->faker->numberBetween($min = 1, $max = 15),
            'order' => $this->faker->numberBetween($min = 1, $max = 100),        
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
