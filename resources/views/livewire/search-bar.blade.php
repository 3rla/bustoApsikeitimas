<div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="flex flex-col items-center justify-between p-4 space-y-4 md:flex-row md:space-y-0 md:space-x-4">
            <div x-data="{
                open: false,
                selectedLocations: @entangle('selectedLocations'),
                searchTerm: '',
                toggleLocation(location) {
                    const index = this.selectedLocations.indexOf(location);
                    if (index === -1) {
                        this.selectedLocations.push(location);
                    } else {
                        this.selectedLocations.splice(index, 1);
                    }
                },
                clearAll() {
                    this.selectedLocations = [];
                },
                confirmSelection() {
                    this.open = false;
                },
                matchesSearch(country, city) {
                    const searchLower = this.searchTerm.toLowerCase();
                    return country.toLowerCase().includes(searchLower) || city.toLowerCase().includes(searchLower);
                },
                shouldShowCountry(country, cities) {
                    if (this.searchTerm === '') return true;
                    if (country.toLowerCase().includes(this.searchTerm.toLowerCase())) return true;
                    return cities.some(city => city.toLowerCase().includes(this.searchTerm.toLowerCase()));
                }
            }" class="relative w-full md:w-1/5">
                <label for="locations" class="block mb-1 text-sm font-medium text-gray-700">Where</label>
                <button @click="open = !open" type="button"
                    class="relative w-full px-4 py-2 text-left bg-white border border-gray-300 rounded-md shadow-sm cursor-default focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <span class="block truncate">
                        <span x-show="selectedLocations.length === 0">Select locations</span>
                        <span x-show="selectedLocations.length > 0"
                            x-text="selectedLocations.length + ' location(s) selected'"></span>
                    </span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute z-50 w-full mt-1 bg-white rounded-md shadow-lg"
                    style="max-height: 60vh; overflow-y: auto;">
                    <div class="sticky top-0 z-10 p-2 bg-white border-b">
                        <input x-model="searchTerm" type="text" placeholder="Search locations"
                            class="w-full px-2 py-1 text-sm border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <ul class="py-1 text-sm">
                        @foreach ($locations as $country => $cities)
                            <template x-if="shouldShowCountry('{{ $country }}', {{ json_encode($cities) }})">
                                <li>
                                    <div class="px-2 py-1 font-semibold text-gray-900 bg-gray-100">{{ $country }}
                                    </div>
                                    <ul>
                                        @foreach ($cities as $city)
                                            <template
                                                x-if="matchesSearch('{{ $country }}', '{{ $city }}')">
                                                <li class="px-2 py-1 cursor-pointer hover:bg-blue-50"
                                                    @click="toggleLocation('{{ $country }},{{ $city }}')">
                                                    <label class="flex items-center space-x-2">
                                                        <input type="checkbox"
                                                            :checked="selectedLocations.includes(
                                                                '{{ $country }},{{ $city }}')"
                                                            class="w-4 h-4 text-blue-600 transition duration-150 ease-in-out form-checkbox">
                                                        <span>{{ $city }}</span>
                                                    </label>
                                                </li>
                                            </template>
                                        @endforeach
                                    </ul>
                                </li>
                            </template>
                        @endforeach
                    </ul>
                    <div class="sticky bottom-0 z-10 flex justify-between p-2 bg-white border-t">
                        <button @click="clearAll"
                            class="px-2 py-1 text-sm text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                            Clear All
                        </button>
                        <button @click="confirmSelection"
                            class="px-2 py-1 text-sm text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                            OK
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/5">
                <label for="available_from" class="block mb-1 text-sm font-medium text-gray-700">Available from</label>
                <input type="date" id="available_from" wire:model="available_from"
                    class="w-full px-4 py-2 text-sm text-gray-900 transition duration-150 ease-in-out bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="w-full md:w-1/5">
                <label for="available_to" class="block mb-1 text-sm font-medium text-gray-700">Available to</label>
                <input type="date" id="available_to" wire:model="available_to"
                    class="w-full px-4 py-2 text-sm text-gray-900 transition duration-150 ease-in-out bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="w-full md:w-1/5">
                <label for="guest_count" class="block mb-1 text-sm font-medium text-gray-700">Guests</label>
                <input type="number" id="guest_count" wire:model="guest_count" placeholder="Number of guests"
                    min="1"
                    class="w-full px-4 py-2 text-sm text-gray-900 transition duration-150 ease-in-out bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="w-full md:w-1/5 md:self-end">
                <button wire:click="searchListings"
                    class="w-full px-4 py-2 font-semibold text-white transition duration-300 ease-in-out transform bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:scale-105 flex items-center justify-center h-[42px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="whitespace-nowrap">Search</span>
                </button>
            </div>
        </div>
    </div>
</div>
