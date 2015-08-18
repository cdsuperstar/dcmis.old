<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use LaravelBook\Ardent\Ardent;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Ardent implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, EntrustUserTrait;
    public static $rules = array(
        'name' => 'required|between:4,16',
        'email' => 'required|email|unique:users',
        'password' => 'required|alpha_num|between:4,8|confirmed',
        'password_confirmation' => 'required|alpha_num|between:4,8'
    );
    public $autoPurgeRedundantAttributes = true;
    public static $passwordAttributes = array('password');
    public $autoHashPasswordAttributes = true;
//    public $autoHydrateEntityFromInput = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

}
