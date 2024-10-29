<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Livewire\WithPagination;

class AdminReports extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';

    protected $queryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reports = Report::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->whereHas('reporter', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('last_name', 'like', '%' . $this->search . '%')
                            ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
                    })
                        ->orWhereHas('reportedUser', function ($query) {
                            $query->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                                ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $this->search . '%']);
                        })
                        ->orWhere('home_listing_id', 'like', '%' . $this->search . '%')
                        ->orWhere('reason', 'like', '%' . $this->search . '%')
                        ->orWhere(function ($query) {
                            $query->whereNotNull('home_listing_id')
                                ->where(function ($query) {
                                    $query->where('reason', 'like', '%Listing%')
                                        ->orWhere('description', 'like', '%Listing%');
                                });
                        });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin-reports', [
            'reports' => $reports,
        ]);
    }

    public function updateStatus($reportId, $newStatus)
    {
        $report = Report::findOrFail($reportId);
        $report->update(['status' => $newStatus]);
    }
}
