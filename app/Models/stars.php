<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stars extends Model
{
    use HasFactory;

    protected $table = 'stars';

    protected $fillable = ['stars'];
}
