<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportForm extends Component
{
    public $type = 'user';
    public $reason = '';
    public $description = '';
    public $reportedId;

    protected $rules = [
        'reason' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
    ];

    public function mount($type, $reportedId)
    {
        $this->type = $type;
        $this->reportedId = $reportedId;
    }

    public function submitReport()
    {
        $this->validate();

        Report::create([
            'user_id' => Auth::id(),
            $this->type === 'user' ? 'reported_user_id' : 'home_listing_id' => $this->reportedId,
            'reason' => $this->reason,
            'description' => $this->description,
        ]);

        $this->reset(['reason', 'description']);
        session()->flash('message', 'Report submitted successfully.');
    }

    public function render()
    {
        return view('livewire.report-form');
    }
}
