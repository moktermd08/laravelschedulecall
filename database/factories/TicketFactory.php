<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->words(3, true),
            'content' => $this->faker->paragraph(),
            'user_id' => User::all()->random()->id,
            'status' => false,
            'updated_at' => null
        ];
    }
}
