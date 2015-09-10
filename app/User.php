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
        'password' => 'required|min:4|confirmed',
        'password_confirmation' => ''
    );
    public static $angularrules = array(
        'name' => 'required|between:4,16|min_len:4|max_len:16',
        'email' => 'required|email|unique:users',
        'password' => 'required|min_len:4',
        'password_confirmation' => 'match:dcEdition.password,Password|required',
    );
    public $autoPurgeRedundantAttributes = true;
    public static $passwordAttributes = array('password');
//    public $autoHydrateEntityFromInput = true;
//    public $autoHashPasswordAttributes = true;

    public function beforeSave()
    {
        // if there's a new password, hash it
        if ($this->isDirty('password')) {
            $this->password = \Hash::make($this->password);
        }

        return true;
        //or don't return nothing, since only a boolean false will halt the operation
    }

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

    public function roles()
    {
        return $this->belongsToMany('App\models\role');
    }

    public function sysmemos()
    {
        return $this->hasMany('App\models\sysmemo');
    }
    public function pxxxb(){
        return $this->hasOne('App\models\pxxxb');
    }
}
