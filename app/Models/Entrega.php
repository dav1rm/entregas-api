<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    public $timestamps = false;
    protected $fillable = ['valor', 'taxa', 'nome_cliente', 'telefone_cliente', 'pagamento'];

    public function entregador()
    {
        return $this->belongsTo('App\User','entregador_id');
    }
    public function vendedor()
    {
        return $this->belongsTo('App\User','vendedor_id');
    }
    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco');
    }
    public function produtos()
    {
        return $this->hasMany('App\Models\Produto');
    }
    public function status()
    {
        return $this->hasMany('App\Models\Status');
    }
}
