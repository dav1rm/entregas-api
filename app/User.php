<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password', 'imagem', 'cpf', 'telefone', 'avaliacao', 'tipo'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function entregas()
    {
        return $this->hasMany('App\Models\Entrega','entregador_id');
    }
    public function solicitacoes()
    {
        return $this->hasMany('App\Models\Entrega','vendedor_id');
    }
    public function pagamentos()
    {
        return $this->hasMany('App\Models\Pagamento');
    }
    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco');
    }
}
