<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['nome', 'atual'];
    public static $table = "status";

    public function entrega()
    {
        return $this->belongsTo('App\Models\Entrega');
    }
}
