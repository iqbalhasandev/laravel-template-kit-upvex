<?php

namespace App\Models;

use App\Traits\ActionBtn;
use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Auth\Traits\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use WithCache;
    use ActionBtn;
    use HasRoles;
    use TwoFactorAuthenticatable;
    use HasProfilePhoto;

    protected static $cacheKey = '_users_';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        // extra field
        'phone',
        'gender',
        'age',
        'address',

        'status',
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
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Status list.
     */
    public static function statusList() : array
    {
        return [
            'Pending'   => 'Pending',
            'Active'    => 'Active',
            'Suspended' => 'Suspended',
        ];
    }

    /**
     * Gender List.
     */
    public static function genderList() : array
    {
        return [
            'Male'   => 'Male',
            'Female' => 'Female',
            'Others' => 'Others',
        ];
    }

    /**
     * Format User Created At.
     */
    public function getCreatedAtAttribute() : string
    {
        return \date('d M, Y', \strtotime($this->attributes['created_at']));
    }

    /**
     * Format User Updated At.
     */
    public function getUpdatedAtAttribute() : string
    {
        return \date('d M, Y', \strtotime($this->attributes['updated_at']));
    }

}