<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-gray-800">Manage Users</h2>

    <div class="mb-6">
        <input wire:model.lazy="search" type="text" placeholder="Search users..."
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    @if ($successMessage)
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90" x-init="setTimeout(() => show = false, 5000)"
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 border-l-4 border-green-500 rounded-r-lg shadow-md"
            role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="font-bold">{{ $successMessage }}</p>
            </div>
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="w-full mb-6 table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('name')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            First Name
                            @if ($sortField === 'name')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('last_name')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Last Name
                            @if ($sortField === 'last_name')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('email')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Email
                            @if ($sortField === 'email')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('phone')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Phone
                            @if ($sortField === 'phone')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('created_at')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Created At
                            @if ($sortField === 'created_at')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button wire:click="sortBy('is_admin')"
                            class="flex items-center font-bold text-gray-700 hover:text-blue-500">
                            Role
                            @if ($sortField === 'is_admin')
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($sortDirection === 'asc')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    @endif
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-4 py-2 font-bold text-left text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->last_name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->phone }}</td>
                        <td class="px-4 py-2">{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2">
                            <span
                                class="{{ $user->is_admin ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }} px-2 py-1 text-xs font-semibold rounded-full">
                                {{ $user->is_admin ? 'Admin' : 'User' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <button wire:click="editUser('{{ $user->encrypted_id }}')"
                                class="px-2 py-1 mr-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-600">
                                Edit
                            </button>
                            <button wire:click="confirmUserDeletion('{{ $user->encrypted_id }}')"
                                class="px-2 py-1 mr-2 font-bold text-white bg-red-500 rounded hover:bg-red-600">
                                Delete
                            </button>
                            <a href="{{ route('user.profile', $user->id) }}"
                                class="px-2 py-1 font-bold text-white bg-green-500 rounded hover:bg-green-600">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-6">
        {{ $users->links() }}
    </div>

    <form wire:submit.prevent="saveUser" class="p-6 rounded-lg bg-gray-50">
        <h3 class="mb-4 text-xl font-bold text-gray-800">{{ $editingUserId ? 'Edit User' : 'Create New User' }}</h3>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-1 font-medium text-gray-700">First Name</label>
                <input wire:model="first_name" type="text" id="first_name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('first_name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="last_name" class="block mb-1 font-medium text-gray-700">Last Name</label>
                <input wire:model="last_name" type="text" id="last_name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('last_name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-1 font-medium text-gray-700">Email</label>
                <input wire:model="email" type="email" id="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="phone" class="block mb-1 font-medium text-gray-700">Phone</label>
                <input wire:model="phone" type="text" id="phone"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('phone')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="role" class="block mb-1 font-medium text-gray-700">Role</label>
                <select wire:model="role" id="role"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="px-4 py-2 mt-6 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            {{ $editingUserId ? 'Update User' : 'Create User' }}
        </button>
    </form>

    <!-- Delete Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this user? This action cannot be undone.') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cancelDeletion" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
