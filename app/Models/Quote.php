<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Eloquent;

class Quote extends Eloquent
{
	public $timestamps = true;
	
	public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'quotes_tags');
    }
}
