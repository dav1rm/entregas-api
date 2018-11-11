<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'valor', 'entrega_id'];

    public function entrega()
    {
        return $this->belongsTo('App\Models\Entrega');
    }
}
