<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
