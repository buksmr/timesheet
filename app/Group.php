	<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
		protected $fillable = ['category_id', 'description_id', 'customer_number', 'cname', 'caddress', 'taccount', 'priority', 'gender', 'pnumber', 'cemail',  'editor1'
	];

	public function users(){
    return $this->belongsToMany(User::class,'user_group');
	}
	public function role(){
	    return $this->belongsTo(Role::class);
	}
}
