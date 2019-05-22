<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getShortNameAttribute()
    {
        if($this->name){
            return '';
        }elseif(!strstr($this->name, " ")){
            return $this->name;
        }
        $names= explode(' ',$this->name, 2);
        $firstName = $names[0];
        $lastName =$names[1];
        
        $shortName=mb_substr($firstName,0,1) .'. '. $lastName;
        return $shortName;
    }
}
