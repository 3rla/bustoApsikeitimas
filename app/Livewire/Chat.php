<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Broadcast;

class Chat extends Component
{
    public $user;
    public $messages = [];
    public $newMessage = '';

    public function mount(User $user)
    {
        $this->user = $user;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Message::where(function ($query) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $this->user->id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->user->id)
                  ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();
    }

    public function sendMessage()
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->user->id,
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();

        Broadcast::channel('chat.' . $this->user->id, function ($user) {
            return ['message' => $message];
        });
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
