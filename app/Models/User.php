<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Persona;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;
  protected $fillable = [
      'name',
      'cod_persona_users',
      'email',
      'password',
  ];
  protected $hidden = [
      'password',
      'remember_token',
  ];
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function persona(){
    return $this->hasOne(Persona::class,  'cod_persona');
}
}
