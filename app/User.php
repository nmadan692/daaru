<?php

namespace App;

use App\Entities\Role;
use App\Notifications\MailTemplateNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address_1', 'address_2', 'city', 'phone', 'account_created', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $appends = [
        'full_name','address'
    ];



    /**
     * Password Notification
     *
     * @param  string  $token
     * @throws \Throwable
     */
    public function sendPasswordResetNotification($token)
    {
        $url = $this->hasRole('admin') ?  route('admin.auth.password.reset', $token) : ($this->hasRole('staff') ? route('staff.auth.password.reset', $token) : route('password.reset', $token));

        $params = [
            'variables' => [
                'BUTTON' => view('emails.button')->with(['link' => $url, 'name' => 'Password Reset'])->render(),
            ],
        ];

        $this->notify(new MailTemplateNotification('password_reset', $params));
    }

    /**
     * Belongs to role
     * @return BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * has role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role) {
        return $this->role()->where('name', $role)->exists();
    }

    /**
     * @return string
     */
    public function getFullNameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }

    public function getAddressAttribute() {
           if($this->address_2!=null) {
               return $this->address_1.' '.$this->address_2;
           }
           else{
               return $this->address_1;
           }
    }
}
