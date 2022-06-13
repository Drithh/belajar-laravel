<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teams_id = [4, 14, 24, 34, 44, 54];
        return [
            'name' => $this->faker->name,
            'player_team_id' => $this->faker->randomElement($teams_id),
        ];
    }
}
