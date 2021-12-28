<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $guarded= [];
    public function appoints()
    {
        return $this->hasMany(Appoint::class, 'vaccine_id');
    }

    public function admin()
    {
        return $this->belongsToMany(Admin::class, 'doctors_vaccines', 'vaccine_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'users_vaccines','vaccine_id');
    }

}
