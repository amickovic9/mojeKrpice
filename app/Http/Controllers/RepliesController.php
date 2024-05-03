<?php

namespace App\Http\Controllers;

use App\Models\ContactMessages;
use App\Models\Replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function addReply(Request $request)
    {
        $reply = $request->validate([
            'reply' => 'required',
            'contactMessage_id' => 'required',

        ]);
        $reply['user_id'] = Auth::user()->id;
        $reply = Replies::create($reply);
        $contact = ContactMessages::where('id', $request->contactMessage_id)->first();
        if (!(Auth::user()->admin)) {
            $contact['read'] = false;
            $contact->update();
        }
        return redirect()->back();
    }
}
