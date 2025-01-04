<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ContactusMessageController extends Controller
{
    //
    // Display a listing of the resource
    public function index()
    {
        $messages = Message::all();
        return view('backend.contact-messages.index', compact('messages'));
    }

    // Display the specified resource
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('backend.contact-messages.show', compact('message'));
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('backend.contact-messages.index')->with('success', 'Message deleted successfully.');
    }
}
