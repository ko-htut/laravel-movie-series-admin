<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shkarkolink extends Model
{
    protected $fillable = [
        'web_name',
        'web_url'
    ];
    public function shkarkolinkable()
    {
        return $this->morphTo();
    }
    public function delete()
    {
        return parent::delete();
    }
}
