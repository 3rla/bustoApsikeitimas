<div>
    <!-- Create Password -->
    <div class="relative">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Create Password</label>
        <div class="relative">
            <input id="password" name="password"
                class="w-full p-3 pr-10 rounded-md border @error('password') border-red-500 @else border-gray-300 @enderror"
                type="{{ $showPassword ? 'text' : 'password' }}" wire:model="password" placeholder="Create a password">
            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5"
                wire:click="togglePasswordVisibility">
                <svg id="passwordEyeIcon" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    @if ($showPassword)
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    @endif
                </svg>
            </button>
        </div>
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="relative mt-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
            Password</label>
        <div class="relative">
            <input id="password_confirmation" name="password_confirmation"
                class="w-full p-3 pr-10 rounded-md border border-gray-300"
                type="{{ $showPassword ? 'text' : 'password' }}" wire:model="passwordConfirmation"
                placeholder="Confirm your password">
        </div>
    </div>
</div>
