<?php

namespace App\Models;

use App\Events\WelcomeEmailEvent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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

    public function activation()
    {
        return $this->hasOne(UserActivation::class);
    }

    public function isActive()
    {
        return $this->activated;
    }

    public function activate()
    {
        $this->activated = 1;
        $this->save();
        $this->activation()->delete();
        Auth::login($this);
        event(new WelcomeEmailEvent($this));
    }
}
