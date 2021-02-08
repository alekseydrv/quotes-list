<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Tag extends Eloquent
{
    public function quotes() 
    {
    	return $this->belongsToMany('App\Models\Quote', 'quotes_tags');
    }
}
