<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $guarded = ['created at','updated_at'];
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
