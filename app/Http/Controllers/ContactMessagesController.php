<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessages;
use Illuminate\Support\Facades\Auth;

class ContactMessagesController extends Controller
{
    public function showContactUsPage(Request $request)
    {
        if(Auth::user()->contactBlock){
            return redirect('/all-products')->with('danger','You are blocked! Contact our team for more information!');
        }
        $user = Auth::user();
        $messages = $user->contactMessages()->orderBy('created_at', 'desc');
        if ($request->has('title')) {
            $messages = $messages->where('title', 'like', '%' . $request->title . '%')->orderBy('created_at', 'desc');
        }
        $messages = $messages->get();

        return view('contact.index', [
            'myMessages' => $messages
        ]);
    }
    public function createContactMessage(Request $request)
    {
        if(Auth::user()->contactBlock){
            return redirect('/all-products')->with('danger','You are blocked! Contact our team for more information!');
        }
        $contact = $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $contact['user_id'] = Auth::user()->id;
        $contactMessage = ContactMessages::create($contact);
        return redirect("/contact-us/{$contactMessage->id}")->with('success', 'You have successfully sent your message');
    }
 
    public function showContactMessage(ContactMessages $contact)
    {
        
        $replies = $contact->replies()->with('user')->orderBy('created_at', 'desc')->get();
        foreach ($replies as $reply) {
            $reply['firstName'] = $reply->user->firstName;
            $reply['lastName'] = $reply->user->lastName;
        }

        return view('contact.message', [
            'message' => $contact,
            'replies' => $replies
        ]);
    }
}
