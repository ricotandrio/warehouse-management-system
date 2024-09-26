<?php

namespace App\Models;

use App\Traits\WithLog;
use App\Traits\WithUuid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, WithUuid, WithLog;

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'password',
        'profile_image',

        'deleted_at',
        'deleted_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function toUserArray(User $user)
    {
        return [
            'username' => $user->username,
            'profile_image' => $user->profile_image,
            'role' => $user->role,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => $user->deleted_at,
        ];
    }

    public static function toMapUsersArrayFromArray(array $users)
    {
        return array_map(function (User $user) {
            if(!$user->deleted_at) {
                return [
                    'username' => $user->username,
                    'profile_image' => $user->profile_image,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'deleted_at' => null,
                ];
            }
        }, $users);
    }

    public static function toMapUsersArrayFromCollection(Collection $users)
    {
        return $users->map(function (User $user) {
            if(!$user->deleted_at) {
                return [
                    'username' => $user->username,
                    'profile_image' => $user->profile_image,
                    'role' => $user->role,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'deleted_at' => null,
                ];
            }
        });
    }
}
