<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $fillable = [
		'UserName', 'LoginName', 'password', 'email', 'is_admin', 'PhoneNumber', 'StaffId', 'user_privilege_id', 'department_id', 'branch_id', 'user_type_id'
	];


	public function user_privilege()
	{
		return $this->belongsTo(User_privilege::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}

	
	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function branches()
	{
		return $this->belongsTo(Branches::class);
	}

	public function user_types()
	{
		return $this->belongsTo(User_types::class);
	}

	public function roles(){
		return $this->belongsToMany(Role::class,'user_role');
	}
	
	public function groups(){
		return $this->belongsToMany(Group::class,'user_group');
	}
}

