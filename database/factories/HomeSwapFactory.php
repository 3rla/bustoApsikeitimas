<?php

namespace Database\Factories;

use App\Models\HomeSwap;
use App\Models\User;
use App\Models\home_listings;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HomeSwapFactory extends Factory
{
    protected $model = HomeSwap::class;

    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('now', '+1 year');
        $endDate = $this->faker->dateTimeBetween($startDate, $startDate->format('Y-m-d') . ' +3 months');

        return [
            'sender_user_id' => User::factory(),
            'receiver_user_id' => User::factory(),
            'sender_listing_id' => home_listings::factory(),
            'receiver_listing_id' => home_listings::factory(),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected', 'completed']),
            'message' => $this->faker->sentence(),
        ];
    }
}
