<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'value' => 'object'
    ];

    /**
     * 键名查询作用域
     *
     * @param $query
     * @param $value
     * @return mixed
     */
    public function scopeOfKey($query, $value)
    {
        return $query->where('key', $value);
    }
}

