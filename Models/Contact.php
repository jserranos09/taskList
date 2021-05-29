<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    // both of these work. you only need one


    // this says, please allow these fields to be fillable
    protected $fillable = ['name', 'email', 'notes'];

    // by passing an empty array, you say all the fields I have in the database table are fillable
    protected $guarded = [];

}
