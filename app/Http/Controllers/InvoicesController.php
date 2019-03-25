<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Factuur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Auth::user()->invoices()->get();
        return view('invoices/index', compact('invoices'));
    }

    public function search()
    {
        // $search_results = Factuur::where('factuurnummer', $_POST['search_invoice'])->first();
        $search_results = Auth::user()->invoices()->where('factuurnummer', $_POST['search_invoice'])->first();
        // $search_results = $search_results[0];
        // dd($search_results);
        return view('invoices/search', compact('search_results'));
    }

    public function search_year()
    {
        // $search_results_years = Factuur::whereYear("datum", $_POST['searchbyyear'])->get();
        $search_results = Auth::user()->invoices()->whereYear("datum", $_POST['searchbyyear'])->get();
        // dd($search_results_years);
        // $search_results = $search_results[0];
        // dd($search_results);
        return view('invoices/search_year', compact('search_results'));
    }

    public function incoming()
    {
        // $incoming_invoices = Factuur::where('inkomend', '0')->get();
        $incoming_invoices = Auth::user()->invoices()->where('inkomend', '0')->get();
        return view('invoices.incoming', compact('incoming_invoices'));
    }

    public function outgoing()
    {
        // $outgoing_invoices = Factuur::where('inkomend', '1')->get();
        $outgoing_invoices = Auth::user()->invoices()->where('inkomend', '1')->get();
        return view('invoices.outgoing', compact('outgoing_invoices'));
    }

    public function details($id)
    {
        $invoice_details = Factuur::find($id);
        $this->authorize('update', $invoice_details);
        return view('invoices.details', compact('invoice_details'));
    }

    public function create()
    {
        $new_invoice = new Factuur;
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'inkomend' => 'required|numeric',
            'factuurnummer' => 'required|numeric',
            'datum' => 'required',
            'vervaldatum' => 'required',
            'bedrag_excl' => 'required|numeric',
            'btw' => 'required|numeric',
            'betaald' => 'required|numeric'
        ]);
        $new_invoice = new Factuur;
        $new_invoice->inkomend = $request->inkomend;
        $new_invoice->factuurnummer = $request->factuurnummer;
        $new_invoice->klant_id = $request->klant_id;
        $new_invoice->datum = $request->datum;
        $new_invoice->vervaldatum = $request->vervaldatum;
        $new_invoice->bedrag_excl = $request->bedrag_excl;
        $new_invoice->btw = $request->btw;
        $new_invoice->betaald = $request->betaald;
        $new_invoice->user_id = Auth::id();
        $new_invoice->save();
        return redirect()->route('invoices');
    }

    public function edit($id)
    {
        $invoice = Factuur::find($id);
        $this->authorize('update', $invoice);
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'inkomend' => 'required|numeric',
            'factuurnummer' => 'required|numeric',
            'datum' => 'date',
            'vervaldatum' => 'date',
            'bedrag_excl' => 'required|numeric',
            'btw' => 'required|numeric',
            'betaald' => 'required|numeric'
        ]);
        // formulier data seven in databank
        $new_invoice = Factuur::find($id);
        $new_invoice->inkomend = $request->inkomend;
        $new_invoice->factuurnummer = $request->factuurnummer;
        $new_invoice->klant_id = $request->klant_id;
        $new_invoice->datum = $request->datum;
        $new_invoice->vervaldatum = $request->vervaldatum;
        $new_invoice->bedrag_excl = $request->bedrag_excl;
        $new_invoice->btw = $request->btw;
        $new_invoice->betaald = $request->betaald;
        $new_invoice->save();
        // terug naar overzicht
        return redirect()->route('invoices');
    }
    public function paid($id)
    {
        $invoice = Factuur::find($id);
        $this->authorize('update', $invoice);
        $invoice->betaald = !$invoice->betaald;
        $invoice->save();
        return redirect()->back();
    }
}
