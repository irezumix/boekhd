<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    //
    public function index()
    {
        $contacts = Auth::user()->contacts()->orderBy('naam')->get();
        return view('contacten.contacts', compact('contacts'));
    }
    public function create()
    {
        // view tonen met formulier
        $contact = new Contact;
        return view('contacten.create', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'btw_nummer' => 'required|numeric'
        ]);
        // formulier data seven in databank
        $contact = new Contact;
        $contact->naam = $request->naam;
        $contact->straat = $request->straat;
        $contact->nummer_bus = $request->nummer_bus;
        $contact->postcode = $request->postcode;
        $contact->gemeente = $request->gemeente;
        $contact->telefoon = $request->telefoon;
        $contact->email = $request->email;
        $contact->btw_nummer = $request->btw_nummer;
        $contact->user_id = Auth::id();
        $contact->save();
        // terug naar overzicht
        return redirect()->route('home');
    }
    public function delete($id)
    {
        $contact = Contact::find($id);
        $this->authorize('update', $contact);
        $contact->delete();
        return redirect()->route('contacten.contacts');
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        $this->authorize('update', $contact);
        return view('contacten.show', compact('contact'));
    }
    public function edit($id)
    {
        $contact = Contact::find($id);
        $this->authorize('update', $contact);
        return view('contacten.edit', compact('contact'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'naam' => 'required',
            'btw_nummer' => 'regex:/[a-zA-Z]{2}\d{10}/u',
        ]);
        // formulier data seven in databank
        $contact = Contact::find($id);
        $this->authorize('update', $contact);
        $contact->naam = $request->naam;
        $contact->straat = $request->straat;
        $contact->nummer_bus = $request->nummer_bus;
        $contact->postcode = $request->postcode;
        $contact->gemeente = $request->gemeente;
        $contact->telefoon = $request->telefoon;
        $contact->email = $request->email;
        $contact->btw_nummer = $request->btw_nummer;
        $contact->user_id = Auth::id();
        $contact->save();
        // terug naar overzicht
        return redirect()->route('contacten.contacts');
    }
}
