<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    use MustVerifyEmail,SoftDeletes;
    protected $table = 'user';
    public $timestamps = false;
    protected $dates = 'deleted_at';//软删除的字段
    protected $guarded = [];
}
