<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HomeSwap;
use App\Models\SignedDocument;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DocumentSigning extends Component
{
    public $homeSwapId;
    public $signature;
    public $showModal = false;

    protected $listeners = ['signDocument' => 'signDocumentAndNotify'];

    protected $rules = [
        'signature' => 'required|string|min:3',
    ];

    public function mount($homeSwapId)
    {
        $this->homeSwapId = $homeSwapId;
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset('signature');
    }

    public function signDocument()
    {
        $this->validate();

        try {
            $homeSwap = HomeSwap::findOrFail($this->homeSwapId);
            $user = Auth::user();

            if (!$homeSwap || !$user) {
                Log::error('Missing home swap or user data', [
                    'homeSwapId' => $this->homeSwapId,
                    'userId' => Auth::id()
                ]);
                throw new \Exception('Missing required information to generate the document');
            }

            $otherUserName = $homeSwap->sender_user_id == Auth::id()
                ? $homeSwap->receiverUser->name
                : $homeSwap->senderUser->name;

            $pdf = Pdf::loadView('documents.responsibility', [
                'homeSwap' => $homeSwap,
                'user' => $user,
                'otherUserName' => $otherUserName,
                'signature' => $this->signature,
            ]);

            $filename = 'responsibility_document_' . $homeSwap->id . '_' . Auth::id() . '.pdf';
            $path = 'documents/' . $filename;

            Storage::put($path, $pdf->output());

            SignedDocument::create([
                'home_swap_id' => $this->homeSwapId,
                'user_id' => Auth::id(),
                'document_path' => $path,
            ]);

            $this->closeModal();
            $this->dispatch('document-signed', homeSwapId: $homeSwap->id);
        } catch (\Exception $e) {
            Log::error('Error generating responsibility document', [
                'error' => $e->getMessage(),
                'homeSwapId' => $this->homeSwapId
            ]);
            $this->addError('document', 'Failed to generate the document. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.document-signing');
    }
}
