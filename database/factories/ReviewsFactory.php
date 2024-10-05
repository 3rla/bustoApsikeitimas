<?php

namespace Database\Factories;

use App\Models\HomeSwap;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reviews::class;

    public function definition()
    {
        return [
            'reviewer_id' => User::factory(),
            'reviewed_id' => User::factory(),
            'home_swap_id' => HomeSwap::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph(),
        ];
    }
}
