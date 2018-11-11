<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamps = false;
    protected $fillable = ['cep', 'rua', 'numero', 'bairro', 'cidade', 'estado', 'latitude', 'longitude', 'complemento', 'entrega_id', 'user_id'];

    public function entrega()
    {
        return $this->belongsTo('App\Models\Entrega');
    }
    public function usuario()
    {
        return $this->belongsTo('App\Models\User');
    }
}
