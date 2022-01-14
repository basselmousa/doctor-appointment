<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function appoints()
    {
        return $this->hasMany(Appoint::class, 'admin_id');
    }

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class, 'doctors_vaccines', 'admin_id');
    }

    public function vaccines_user()
    {

        return $this->belongsToMany(Vaccine::class,'users_vaccines','admin_id')->withTimestamps();
    }

    public function scopeChildren(Builder $query)
    {
        return $query->select(['admins.full_name as admin', 'users.full_name as user' , 'vaccines.vaccines_name as vaccine','users_vaccines.created_at as date'] )
            ->from('users_vaccines')
            ->join('admins', 'admins.id', '=', 'users_vaccines.admin_id')
            ->join('users', 'users.id', '=', 'users_vaccines.user_id')
            ->join('vaccines', 'vaccines.id', '=', 'users_vaccines.vaccine_id')
            ->where('users_vaccines.admin_id' ,'=', auth('admin')->id())->get();
    }
}
