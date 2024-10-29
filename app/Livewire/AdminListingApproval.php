<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\home_listings;
use App\Models\HomeSwap;
use Illuminate\Support\Facades\Log;

class AdminListingApproval extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'title';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function approveListing($listingId)
    {
        $listing = home_listings::findOrFail($listingId);
        $listing->approval_status = 'approved';
        $listing->save();

        session()->flash('message', 'Listing approved successfully.');
    }

    public function rejectListing($listingId)
    {
        $listing = home_listings::findOrFail($listingId);
        $listing->approval_status = 'rejected';
        $listing->save();

        session()->flash('message', 'Listing rejected successfully.');
    }

    public function render()
    {
        $pendingListings = home_listings::where('approval_status', 'pending')
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('title', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($userQuery) {
                            $userQuery->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                                ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
                        });
                });
            })
            ->when($this->sortField === 'user.name', function ($query) {
                $query->join('users', 'home_listings.user_id', '=', 'users.id')
                    ->orderBy('users.name', $this->sortDirection);
            }, function ($query) {
                $query->orderBy($this->sortField, $this->sortDirection);
            })
            ->paginate(10);

        return view('livewire.admin-listing-approval', [
            'pendingListings' => $pendingListings
        ]);
    }
}
