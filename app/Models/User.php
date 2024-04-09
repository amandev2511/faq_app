<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_automap'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    public function updateOrCreate($shopUrl, $accessToken) 
    {
        $userDetail = $this->where('name', $shopUrl)->first();
        if (is_object($userDetail)) {
            $userDetail->password = $accessToken;
            $userDetail->updated_at = date('Y-m-d H:i:s');
            return $userDetail->update();
        } else {
            $this->name = $shopUrl;
            $this->email = '';
            $this->password = $accessToken;
            $this->created_at = date('Y-m-d H:i:s');
            return $this->save();
        }
    }
}
