<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityEffective extends Model
{
    protected $fillable = ['user_id', 'name', 'uid', 'effective_count'];
}
