<div>
    <button wire:click="openModal"
        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        Sign and Accept
    </button>

    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <h2 class="mb-4 text-2xl font-bold leading-6 text-gray-900" id="modal-title">
                            Responsibility Agreement
                        </h2>
                        <div class="mt-2 space-y-4 text-sm text-gray-600">
                            <p>I, <span class="font-semibold">{{ auth()->user()->name }}</span>, hereby acknowledge and
                                agree to the following responsibilities during my home swap:</p>

                            <ol class="space-y-2 list-decimal list-inside">
                                <li>I will treat the property with respect and care, as if it were my own.</li>
                                <li>I will promptly report any damages or issues to the property owner.</li>
                                <li>I will adhere to all house rules and guidelines provided by the property owner.</li>
                                <li>I will not allow unauthorized guests to stay at the property.</li>
                                <li>I will leave the property in the same condition as I found it, clean and tidy.</li>
                                <li>I accept financial responsibility for any damages caused by me or my guests during
                                    the stay.</li>
                                <li>I will not engage in any illegal activities on the property.</li>
                                <li>I will respect the privacy and property of neighbors.</li>
                            </ol>

                            <p>By signing below, I confirm that I have read, understood, and agree to all the above
                                responsibilities.</p>
                        </div>
                        <div class="mt-6">
                            <label for="signature" class="block text-sm font-medium text-gray-700">Digital
                                Signature</label>
                            <input type="text" wire:model="signature" id="signature"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Type your full name as signature">
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="signDocument" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Sign and Submit
                        </button>
                        <button wire:click="closeModal" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
