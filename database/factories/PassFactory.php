<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static $currentUser = 2;

    public function definition()
    {
        return [
            'user_id' => self::$currentUser++,
            'device_id' => 2,
            'approved' => 0
        ];
    }
}
