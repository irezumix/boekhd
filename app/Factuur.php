<?php

namespace App;
use App\Contact;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Factuur extends Model
{
    protected $table = 'facturen';

    protected $dates = [
        'datum', 'vervaldatum'
    ];

    public function contact() {
        return $this->belongsTo('App\Contact', "klant_id");
    }
}
