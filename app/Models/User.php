<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'email',
        'nid',
        'age',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appoints()
    {
        return $this->hasMany(Appoint::class,'user_id');
    }

    public function allergy()
    {
        return $this->hasMany(Allergy::class,'user_id');
    }

    public function vaccines()
    {

        return $this->belongsToMany(Vaccine::class,'users_vaccines','user_id')
            ->withPivot(['admin_id'])
            ->withTimestamps();
    }

    public function scopeTaked(Builder $query){
        return $query->select(['admins.full_name as admin', 'users.full_name as user' , 'vaccines.vaccines_name as vaccine','users_vaccines.created_at as date'] )
            ->from('users_vaccines')
            ->join('admins', 'admins.id', '=', 'users_vaccines.admin_id')
            ->join('users', 'users.id', '=', 'users_vaccines.user_id')
            ->join('vaccines', 'vaccines.id', '=', 'users_vaccines.vaccine_id')
            ->where('users_vaccines.user_id' ,'=', auth('web')->id())->get();
    }


}
