<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUsers extends Model
{
    protected $table='users';
    protected $fillable=['name','email','admin','user','password'];

    public function relUsers()
    {
        //
    }
}
