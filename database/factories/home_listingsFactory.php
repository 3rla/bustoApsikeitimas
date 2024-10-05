<?php

namespace Database\Factories;

use App\Models\home_listings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class home_listingsFactory extends Factory
{
    protected $model = home_listings::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'guest_amount' => $this->faker->numberBetween(1, 8),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'address' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'available_from' => $this->faker->dateTimeBetween('now', '+1 month'),
            'available_to' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
            'amenities' => json_encode($this->faker->randomElements(['Wi-Fi', 'TV', 'Kitchen', 'Washing Machine', 'Air Conditioning', 'Heating', 'Parking'], $this->faker->numberBetween(2, 5))),
            'images' => json_encode($this->faker->randomElements([
                'home_images/image1.png',
                'home_images/image2.png',
                'home_images/image3.png',
                'home_images/image4.png',
                'home_images/image5.png'
            ], $this->faker->numberBetween(1, 5))),
        ];
    }
}
