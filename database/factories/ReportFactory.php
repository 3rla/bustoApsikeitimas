<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\User;
use App\Models\home_listings;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition()
    {
        $isUserReport = $this->faker->boolean;

        return [
            'user_id' => User::factory(),
            'reported_user_id' => $isUserReport ? User::factory() : null,
            'home_listing_id' => !$isUserReport ? home_listings::factory() : null,
            'reason' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'resolved', 'dismissed']),
        ];
    }
}
