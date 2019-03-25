
// Route
Route::get('invoices/{id}/pay', ...);


// Controller
function pay($id) {
    $invoice = Invoice::find($id);
    $invoice->paid = !$invoice->paid;
    $invoice->save();
    return redirect()->back();
}

// View
<a href="{{ route('invoice.pay', $invoice->id) }}">{{ $invoice->paid ? 'Paid':'Not paid' }}</a>