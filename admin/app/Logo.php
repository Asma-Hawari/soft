<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable=['path'];

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
