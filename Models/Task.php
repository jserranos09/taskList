<?php

// Uses the plural name of the model to store data
// Task model stores data in the tasks table

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     *  Table: tasks
     *  id = int
     *  name = string
     *  created_at = timestamp
     *  updated_at = timestamp
     *  user_id = int / null    31
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


    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'user_id',
    ];


    // this "user" method gets the user that owns the task
    public function user()
    {
        return $this->belongsTo(User::class);
        // model = user
        // table = users
        // id = id
        // lets look at myself, and see if i have a user_id
        // oh i do have a user_id = 31
        // lets go find that user! with id 31
        // oh i found it! lets return it.
        // return $user
        //return $this->hasMany('App\Model\User');
    }

}
