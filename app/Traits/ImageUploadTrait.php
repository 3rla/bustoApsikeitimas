<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUploadTrait
{
    /**
     * Uploads multiple images to the specified path.
     *
     * @param array $images An array of image files to be uploaded.
     * @param string $path The directory path where images will be stored. Default is 'home_listings'.
     * @return array An array of paths where the images have been stored.
     */
    public function uploadImages($images, $path = 'home_listings')
    {
        $imagePaths = [];

        foreach ($images as $image) {
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs($path, $filename, 'public');
            $imagePaths[] = $imagePath;
        }

        return $imagePaths;
    }

    /**
     * Delete the specified images from the public storage disk.
     *
     * @param array $images An array of image paths to be deleted.
     * @return void
     */
    public function deleteImages($images)
    {
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }
    }
}
