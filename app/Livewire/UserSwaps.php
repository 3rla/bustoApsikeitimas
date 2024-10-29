<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HomeSwap;
use App\Models\SignedDocument;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserSwaps extends Component
{
    public $currentSwaps;
    public $offers;
    public $swapHistory;

    public function mount()
    {
        $user = Auth::user();

        // Get the current active swap
        $this->currentSwaps = HomeSwap::where(function ($query) use ($user) {
            $query->where('sender_user_id', $user->id)
                ->orWhere('receiver_user_id', $user->id);
        })
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->where('sender_status', 'accepted')
                        ->where('receiver_status', 'accepted');
                })->orWhere(function ($q) {
                    $q->where('sender_status', 'accepted')
                        ->where('receiver_status', 'completed');
                })->orWhere(function ($q) {
                    $q->where('sender_status', 'completed')
                        ->where('receiver_status', 'accepted');
                });
            })
            ->whereDate('end_date', '>=', now()) // Only include swaps that haven't ended yet
            ->with(['senderUser', 'receiverUser', 'senderListing', 'receiverListing'])
            ->get();

        // Get pending offers
        $this->offers = HomeSwap::where(function ($query) use ($user) {
            $query->where('receiver_user_id', $user->id)
                ->orWhere('sender_user_id', $user->id);
        })
            ->where(function ($query) {
                $query->where('sender_status', 'pending')
                    ->orWhere('receiver_status', 'pending');
            })
            ->with(['senderUser', 'receiverUser', 'senderListing', 'receiverListing'])
            ->get();

        // Get swap history
        $this->swapHistory = HomeSwap::where(function ($query) use ($user) {
            $query->where('sender_user_id', $user->id)
                ->orWhere('receiver_user_id', $user->id);
        })
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->where('sender_status', 'completed')
                        ->where('receiver_status', 'completed');
                })->orWhere(function ($q) {
                    $q->where('sender_status', 'rejected')
                        ->where('receiver_status', 'rejected');
                });
            })
            ->with(['senderUser', 'receiverUser', 'senderListing', 'receiverListing'])
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getStatusClass($status)
    {
        switch ($status) {
            case 'approved':
                return 'text-green-600 bg-green-100';
            case 'rejected':
                return 'text-red-600 bg-red-100';
            case 'pending':
                return 'text-yellow-600 bg-yellow-100';
            default:
                return 'text-blue-600 bg-blue-100';
        }
    }

    public function getSwapStatus($swap)
    {
        $now = Carbon::now();

        if ($swap->sender_status === 'rejected' || $swap->receiver_status === 'rejected') {
            return 'rejected';
        }

        if ($swap->sender_status === 'completed' && $swap->receiver_status === 'completed') {
            return 'completed';
        }

        if ($swap->sender_status === 'accepted' && $swap->receiver_status === 'accepted') {
            if ($now->lt($swap->start_date)) {
                return 'Accepted';
            } elseif ($now->gte($swap->start_date) && $now->lte($swap->end_date)) {
                return 'in progress';
            } else {
                return 'completed';
            }
        }

        if ($swap->sender_status === 'pending' || $swap->receiver_status === 'pending') {
            return 'pending';
        }

        return 'unknown';
    }

    public function acceptOffer($offerId)
    {
        $offer = HomeSwap::findOrFail($offerId);
        $userRole = $offer->sender_user_id == Auth::id() ? 'sender' : 'receiver';

        // Check if both users have signed the document
        $senderSigned = SignedDocument::where('swap_id', $offer->id)
            ->where('user_id', $offer->sender_user_id)
            ->exists();
        $receiverSigned = SignedDocument::where('swap_id', $offer->id)
            ->where('user_id', $offer->receiver_user_id)
            ->exists();

        if (!$senderSigned || !$receiverSigned) {
            $this->addError('document', 'Both users must sign the responsibility document before accepting the offer.');
            return;
        }

        // Update the status
        $offer->update([
            "{$userRole}_status" => 'accepted'
        ]);

        // Check if both users have accepted
        if ($offer->sender_status === 'accepted' && $offer->receiver_status === 'accepted') {
            $offer->update(['status' => 'active']);
        }

        $this->emit('offerUpdated');
    }

    public function rejectOffer($offerId)
    {
        $offer = HomeSwap::findOrFail($offerId);
        $userRole = $offer->sender_user_id == Auth::id() ? 'sender' : 'receiver';
        $offer->{$userRole . '_status'} = 'rejected';
        $offer->save();

        $this->dispatch('offerRejected');
        $this->mount(); // Refresh the component data
    }

    public function render()
    {
        return view('livewire.user-swaps');
    }
}
