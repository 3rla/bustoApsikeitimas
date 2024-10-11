<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;

class AdminUsersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $successMessage = '';

    public $confirmingUserDeletion = false;
    public $userIdToDelete;

    public $first_name, $last_name, $email, $phone, $role;
    public $editingUserId;

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->editingUserId)],
            'phone' => [
                'required',
                'string',
                'max:20',
                'regex:/^(\+)?[0-9]{9,15}$/',
                Rule::unique('users')->ignore($this->editingUserId)
            ],
            'role' => 'required|in:user,admin',
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSuccessMessage()
    {
        $this->successMessage = '';
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function editUser($encryptedUserId)
    {
        $userId = Crypt::decryptString($encryptedUserId);
        $this->editingUserId = $userId;
        $user = User::findOrFail($userId);
        $this->first_name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role = $user->is_admin ? 'admin' : 'user';
    }

    public function saveUser()
    {
        $this->validate();

        $userData = [
            'name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'is_admin' => $this->role === 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        if ($this->editingUserId) {
            $user = User::findOrFail($this->editingUserId);
            $user->update($userData);
            $this->successMessage = 'User updated successfully!';
        } else {
            $userData['password'] = bcrypt('password');
            User::create($userData);
            $this->successMessage = 'User created successfully!';
        }

        $this->reset(['first_name', 'last_name', 'email', 'phone', 'role', 'editingUserId']);
    }

    public function confirmUserDeletion($encryptedUserId)
    {
        $this->confirmingUserDeletion = true;
        $this->userIdToDelete = Crypt::decryptString($encryptedUserId);
    }

    public function deleteUser()
    {
        $user = User::find($this->userIdToDelete);
        if ($user) {
            $user->delete();
            $this->successMessage = 'User deleted successfully.';
        }
        $this->confirmingUserDeletion = false;
        $this->userIdToDelete = null;
    }

    public function cancelDeletion()
    {
        $this->confirmingUserDeletion = false;
        $this->userIdToDelete = null;
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        $users->getCollection()->transform(function ($user) {
            $user->encrypted_id = Crypt::encryptString($user->id);
            return $user;
        });

        return view('livewire.admin-users-table', [
            'users' => $users,
        ]);
    }
}
