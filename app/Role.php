	<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
		protected $fillable = ['category_id', 'description_id', 'customer_number', 'cname', 'caddress', 'taccount', 'priority', 'gender', 'pnumber', 'cemail',  'editor1'
	];

	public function users(){
		return $this->belongsToMany(User::class,'user_role');
	}
	public function permissions(){
		return $this->belongsToMany(Permission::class,'role_permission');
	}
	public function groups(){
		return $this->hasMany(Group::class);
	}
}
