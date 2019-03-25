<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Factuur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
    public function index() {
        return view('results/index');
    }
    public function resultGlobal(Request $request) {
        $result = false;
        $revenue = false;
        $costs = false;
        $year = false;
        if($request->has('jaar')) {
            $results = Auth::user()->invoices()->whereYear('created_at', $request->jaar)->get();
            $year = $request->jaar;
            if(count($results) > 0) {
                $invoicesIn = Auth::user()->invoices()->where('inkomend', '=',1)->get();
                $invoicesOut = Auth::user()->invoices()->where('inkomend', '=',0)->get();
                $revenue = 0;
                $costs = 0;
                foreach($invoicesIn as $invoiceIn) {
                    $revenue += $invoiceIn->bedrag_excl;
                }
                foreach($invoicesOut as $invoiceOut) {
                    $costs += $invoiceOut->bedrag_excl;
                }
                $result = $revenue - $costs;
            } 
        }
        return view('results/global', compact('revenue', 'costs', 'result','year'));
    }

    public function resultPerClient(Request $request) {
        $result = false;
        $klant = false;
        if($request->has('jaar') && $request->has('klant_id')) {
            $klant = Auth::user()->contacts()->where('id',$request->klant_id)->get();
            $klant = $klant[0]->naam;
            $invoicesOut = Factuur::where('inkomend',0)->where('klant_id',$request->klant_id)->whereYear('datum',$request->jaar)->get();
            $result = 0;
            foreach($invoicesOut as $invoice) {
                $result += $invoice->bedrag_excl;
            }
        }
        return view('results/client', compact('result','klant'));
    }

    public function vat(Request $request) {
        $btwList = false;
        if($request->has('jaar')) {
            $results = Auth::user()->invoices()->whereYear('created_at', $request->jaar)->get();
            $year = $request->jaar;
            if(count($results) > 0) {
                $invoicesOut = Auth::user()->invoices()->where('inkomend', 0)->get();
                $invoicesOut = $invoicesOut->groupBy('klant_id');
                $btwList = [];
                foreach($invoicesOut as $invoicesPerClient) {
                    $vatNumber = "";
                    $totalVAT = 0;
                    foreach ($invoicesPerClient as $invoicePerClient) {
                        $totalVAT += ($invoicePerClient->bedrag_excl*$invoicePerClient->btw/100);
                        $vatNumber = $invoicePerClient->contact->btw_nummer;
                    } 
                    $btwList[$vatNumber] = $totalVAT;
                } 
            }
        }
        return view('results/vat', compact('btwList'));
    }
}
