<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';

    protected $fillable = [
        'username','name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getAllAdmin(){
        $admin = Admin::select('id','name','email','username')->get();
        return $admin;
    }

    public function editAdmin($id){
        $admin = Admin::find($id);
        return $admin;
    }
}
