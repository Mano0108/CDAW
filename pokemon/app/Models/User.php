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
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    protected $table = 'user';

    protected $primaryKey = 'user_id';

    public static function isUser(string $user_mail, string $password){
        return User::where('email', '=', $user_mail, 'and')->where('password', '=', $password)->get();
    }

    /**
     * return a collection of User which has a particular value in a particular field
     * @param string $column
     * @param string|int|float $value
     */
    public static function getUser(string $column, string|int|float $value){
        return User::where($column, '=', $value)->get();
    }
}
