<?php

namespace App\Traits;

trait ProcessListingDataTrait
{
    /**
     * Processes the given images by ensuring they are in an array format.
     *
     * @param mixed $images The images to be processed.
     * @return array The processed images in an array format.
     */
    protected function processImages($images)
    {
        return $this->ensureArray($images);
    }

    /**
     * Processes the amenities list, optionally limiting the number of amenities displayed.
     *
     * @param array|string $amenities The list of amenities to process. Can be an array or a string.
     * @param int|null $limit Optional. The maximum number of amenities to display. If null, all amenities are returned.
     * @return array If $limit is provided, returns an associative array with 'display' and 'remaining' keys.
     *               'display' contains the limited list of amenities.
     *               'remaining' contains the count of remaining amenities.
     *               If $limit is not provided, returns the full list of amenities.
     */
    protected function processAmenities($amenities, $limit = null)
    {
        $amenities = $this->ensureArray($amenities);

        if ($limit) {
            $displayAmenities = array_slice($amenities, 0, $limit);
            $remainingCount = count($amenities) - $limit;

            return [
                'display' => $displayAmenities,
                'remaining' => $remainingCount > 0 ? $remainingCount : 0
            ];
        }

        return $amenities;
    }

    /**
     * Ensures that the provided data is returned as an array.
     *
     * This method checks if the input data is a string and attempts to decode it as JSON.
     * If the decoding is successful, the resulting array is returned. If the input data
     * is already an array, it is returned as-is. If the input data is neither a string
     * nor an array, an empty array is returned.
     *
     * @param mixed $data The input data to be ensured as an array.
     * @return array The input data converted to an array, or an empty array if conversion is not possible.
     */
    protected function ensureArray($data)
    {
        if (is_string($data)) {
            return json_decode($data, true) ?? [];
        }
        return is_array($data) ? $data : [];
    }
}
