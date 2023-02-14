<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Publication;

class MessageController extends Controller
{

    public function requestRejectMessage(Request $request, $id)
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'publication_id' => Publication::where(['id' => Publication::findOrFail($id)->id])->first()->id,
            'recipient_id' => User::where(['id' => Publication::findOrFail($id)->user_id])->first()->id,
            'content' => $request->input('content')
        ]);
        return redirect(route('requests'));
    }
}
