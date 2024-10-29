<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('chat.index', compact('users'));
    }

    public function show(User $user)
    {
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        $recentChats = Message::where('sender_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($message) {
                return $message->sender_id == auth()->id()
                    ? $message->receiver
                    : $message->sender;
            })
            ->unique('id')
            ->take(5);

        return view('chat.show', compact('user', 'messages', 'recentChats'));
    }
}
