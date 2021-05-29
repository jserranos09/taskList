<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// looks for the plural version of the model name (User looks for Users table in databse)
class User extends Authenticatable
{
    /**
     *   Table: users
     *      id = int
     *      role_id = int / null
     *      name = string
     *      email = string
     *      avatar = string / default:users/default.png
     *       ...
     *
     *
     *
     *
     *
     *
     *
     *
     *
     */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relationships. Called "tasks" method
    public function tasks()
    {
        // each user has many tasks
        return $this->hasMany(Task::class);
        // loads Task Class
        // okay, im a user model = user
        // my primary id = id
        // if someone belongs to me, they would save user_id
        // lets check the Task class, to see if they have a user_id
        // lets take my id = 31
        // lets peform a query as follows
        // return  Task::where('user_id', '=', 31)->get();
        //return $this->hasMany('App\Model\Task');
    }
}
