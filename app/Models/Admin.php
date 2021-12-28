<?php

namespace App\Models;

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

}
