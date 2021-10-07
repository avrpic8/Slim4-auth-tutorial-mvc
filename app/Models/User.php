<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {

    use SoftDeletes;

    protected $fillable = ['email', 'first_name', 'last_name', 'avatar', 'password', 'status', 'is_active', 'verify_token',
        'user_type', 'remember_token', 'remember_token_expire'];
    protected $dates = ['deleted_at'];
}