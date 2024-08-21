<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUsers extends Model
{
    protected $table='book';
    protected $fillable=['nome','id_user','idade','emprego'];

    public function relUsers()
    {
        return $this->hasOne('App\Models\Models\ModelUsers', foreignKey: 'id_user', localKey:'id_user');
    }
}
