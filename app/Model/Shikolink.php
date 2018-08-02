<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shikolink extends Model
{
    protected $fillable = [
        'web_name',
        'web_url'
    ];
    public function shikolinkable()
    {
        return $this->morphTo();
    }
    public function delete()
    {
        return parent::delete();
    }
}
