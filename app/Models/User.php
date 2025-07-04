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

    public static $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed']
    ];

    public static $update_rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['string', 'email', 'max:255'],
        'password' => ['nullable','string', 'min:6', 'confirmed']
    ];

    public static $messages = [
        'name.required' => 'Name is required',
        'name.max' => 'Name must be at most 255 characters',
        'email.required' => 'Email is required',
        'email.email' => 'Email is invalid',
        'email.max' => 'Email must be at most 255 characters',
        'email.unique' => 'Email has already been taken',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 6 characters',
        'password.confirmed' => 'Password confirmation does not match',
    ];

    public static $update_messages = [
        'name.required' => 'Name is required',
        'name.max' => 'Name must be at most 255 characters',
        'email.email' => 'Email is invalid',
        'email.max' => 'Email must be at most 255 characters',
        'password.min' => 'Password must be at least 6 characters',
        'password.confirmed' => 'Password confirmation does not match',
    ];
}
