<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['category_id', 'description_id', 'customer_number', 'cname', 'caddress', 'taccount', 'priority', 'gender', 'pnumber', 'cemail',  'editor1'
    ];


  	public function roles(){
	    return $this->belongsToMany(Role::class,'role_permission');
}
}
