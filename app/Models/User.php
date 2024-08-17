<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected static $user;

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
        'password' => 'hashed',
    ];


    public static function saveInfo($request){

        self::$user = User::find($request->id); // Retrieve the user instance

        if (!self::$user) {
            // Handle the case where the user is not found
            $request->session()->flash('error', 'User not found');
            return;
        }
        self::$user->name = $request->name;
        self::$user->email = $request->email;
        if ($request->filled('password')) {
            self::$user->password = Hash::make($request->password);
        }


        self::$user->save();

        $successMessage = " Profile Setting has been updated successfully";
        $request->session()->flash('success', $successMessage);
    }
}
