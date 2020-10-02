<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = ['category_id', 'name'];


    
      public function tickets(){

    	return $this->hasMany(Ticket::class);

    }

}