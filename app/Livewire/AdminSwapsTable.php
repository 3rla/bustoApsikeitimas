<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\HomeSwap;
use Illuminate\Support\Facades\Crypt;

class AdminSwapsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $successMessage = '';

    public $confirmingSwapDeletion = false;
    public $swapIdToDelete;

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
        $this->sortDirection = $this->sortField === $field
            ? $this->sortDirection === 'asc' ? 'desc' : 'asc'
            : 'asc';
        $this->sortField = $field;
    }

    public function confirmSwapDeletion($swapId)
    {
        $this->confirmingSwapDeletion = true;
        $this->swapIdToDelete = $swapId;
    }

    public function deleteSwap()
    {
        $swap = HomeSwap::find($this->swapIdToDelete);
        if ($swap) {
            $swap->delete();
            $this->successMessage = 'Swap deleted successfully.';
        }
        $this->confirmingSwapDeletion = false;
    }

    public function cancelDeletion()
    {
        $this->confirmingSwapDeletion = false;
    }

    public function render()
    {
        $swaps = HomeSwap::with(['senderUser', 'receiverUser', 'senderHome', 'receiverHome'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('senderUser', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%');
                    })->orWhereHas('receiverUser', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%');
                    })->orWhereHas('senderHome', function ($q) {
                        $q->where('title', 'like', '%' . $this->search . '%');
                    })->orWhereHas('receiverHome', function ($q) {
                        $q->where('title', 'like', '%' . $this->search . '%');
                    });
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        $swaps->getCollection()->transform(function ($swap) {
            $swap->encrypted_id = Crypt::encryptString($swap->id);
            return $swap;
        });

        return view('livewire.admin-swaps-table', [
            'swaps' => $swaps,
        ]);
    }
}
