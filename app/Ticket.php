<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['category_id', 'description_id', 'ticket_id', 'customer_number', 'cname', 'caddress', 'taccount','department_id', 'priority', 'gender', 'pnumber', 'cemail',  'editor1'
    ];


    public function category(){

    	return $this->belongsTo(Category::class);

    }

     public function description(){

    	return $this->belongsTo(Description::class);

    }
   
       public function department(){

        return $this->belongsTo(Department::class);

    }
}
