<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Valideer de input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Sla het bericht op in de database
        ContactMessage::create($validated);

        // Stuur een e-mail
        Mail::raw($validated['message'], function ($message) use ($validated) {
            $message->from($validated['email'], $validated['name'])
                   ->to('info@pizzabestellijn.nl')
                   ->subject('Contact Formulier: ' . $validated['subject']);
        });

        // Redirect terug met succes bericht
        return redirect()
            ->route('contact.show')
            ->with('success', 'Bedankt voor uw bericht! We nemen zo spoedig mogelijk contact met u op.');
    }
} 