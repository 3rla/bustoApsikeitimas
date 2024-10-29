<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\reviews;
use Illuminate\Support\Str;

class AdminReviewsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

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

    public function deleteReview($id)
    {
        // Implement delete logic here
    }

    public function render()
    {
        $reviews = reviews::with(['reviewer', 'reviewed', 'home_swap.receiverListing'])
            ->when($this->search, function ($query) {
                $query->where('comment', 'like', '%' . $this->search . '%')
                    ->orWhereHas('reviewer', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('reviewed', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('home_swap.receiverListing', function ($query) {
                        $query->where('title', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        $reviews->getCollection()->transform(function ($review) {
            $review->listing_title = $review->home_swap->receiverListing
                ? Str::limit($review->home_swap->receiverListing->title, 30)
                : 'No listing available';
            return $review;
        });

        return view('livewire.admin-reviews-table', [
            'reviews' => $reviews,
        ]);
    }
}
