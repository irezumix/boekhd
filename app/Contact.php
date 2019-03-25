<?php

namespace App;

use App\Factuur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    public function facturen()
    {
        return $this->hasMany('App\Factuur');
    }
}
