<?php

namespace App\Http\Controllers;

use App\Models\dcon;
use App\Models\SendEmail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class DconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dcon $dcon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dcon $dcon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dcon $dcon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dcon $dcon)
    {
        //
    }

    public function getmsg(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'category' => 'required',
            'msg' => 'required',
        ]);


        // Prepare the email body
        $emailBody = "You have a new contact form submission:\n\n"
            . "Name: {$request->name}\n"
            . "Email: {$request->email}\n"
            . "Phone: {$request->phone}\n\n"
            . "Category: {$request->category}\n\n"
            . "Message:\n{$request->msg}";

        Mail::raw($emailBody, function ($message) use ($request) {
            $message->to("shahed@ridgebenit.com")
                ->subject("New Contact Form Submission from: " . $request->name)
                ->from('shahed@ridgebenit.com', 'Ridgeben IT Website Form')
                ->replyTo($request->email, $request->name); // So you can reply directly
        });

        SendEmail::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'category' => $request->category,
            'msg' => $request->msg,
        ]);


        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Message sent successfully!');
    }
}
