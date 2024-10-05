<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reviews;
use App\Models\home_listings;
use App\Models\User;
use App\Models\HomeSwap;

class ListingSwapReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 50 users
        User::factory(50)->create()->each(function ($user) {
            // Each user has 1 or 2 home listings
            $listingsCount = rand(1, 2);
            home_listings::factory($listingsCount)->create(['user_id' => $user->id]);
        });

        // Create swaps and reviews
        home_listings::all()->each(function ($listing) {
            // Each listing has between 1 and 4 swaps
            $swapsCount = rand(1, 4);
            for ($i = 0; $i < $swapsCount; $i++) {
                $otherListing = home_listings::where('user_id', '!=', $listing->user_id)->inRandomOrder()->first();

                // Only create a swap if there's another listing available
                if ($otherListing) {
                    $swap = HomeSwap::factory()->create([
                        'sender_user_id' => $listing->user_id,
                        'sender_listing_id' => $listing->id,
                        'receiver_user_id' => $otherListing->user_id,
                        'receiver_listing_id' => $otherListing->id,
                    ]);

                    // Each swap has 2 reviews
                    Reviews::factory()->create([
                        'reviewer_id' => $swap->sender_user_id,
                        'reviewed_id' => $swap->receiver_user_id,
                        'home_swap_id' => $swap->id,
                    ]);

                    Reviews::factory()->create([
                        'reviewer_id' => $swap->receiver_user_id,
                        'reviewed_id' => $swap->sender_user_id,
                        'home_swap_id' => $swap->id,
                    ]);
                }
            }
        });
    }
}
