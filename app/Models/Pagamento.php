<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['tipo', 'valor', 'descricao'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
