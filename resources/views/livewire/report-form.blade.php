<div x-data="{ showConfirmation: false }">
    <h2 class="mb-4 text-2xl font-bold">Report {{ ucfirst($type) }}</h2>
    <form wire:submit.prevent="submitReport">
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="reason">
                Reason
            </label>
            <input wire:model="reason"
                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="reason" type="text" placeholder="Reason for report">
            @error('reason')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="description">
                Description
            </label>
            <textarea wire:model="description"
                class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="description" placeholder="Detailed description"></textarea>
            @error('description')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                type="submit">
                Submit Report
            </button>
        </div>
    </form>

    <div x-show="showConfirmation" class="fixed inset-0 w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50"
        x-cloak>
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Confirm Submission</h3>
                <div class="py-3 mt-2 px-7">
                    <p class="text-sm text-gray-500">Are you sure you want to submit this report?</p>
                </div>
                <div class="items-center px-4 py-3">
                    <button @click="showConfirmation = false; $wire.submitReport()"
                        class="px-4 py-2 text-base font-medium text-white bg-blue-500 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Yes, submit
                    </button>
                    <button @click="showConfirmation = false"
                        class="px-4 py-2 text-base font-medium text-gray-700 bg-gray-300 rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
