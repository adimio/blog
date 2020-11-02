<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;

class User extends AuthUser
{
    use MustVerifyEmail,Notifiable;
    use SoftDeletes;

    protected $table = 'user';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

}
