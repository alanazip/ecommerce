<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'imagem',
        'categoria_id',
        'fornecedor_id'
    ];

    public function categoria()
    {
        return $this->belongsToMany('nome', 'categoria_id');
    }

    public function fornecedor()
    {
        return $this->belongsToMany(Fornecedor::class);
    }

    public function user()
    {
        return $this->HasMany(User::class);
    }

    use HasFactory;

    public function produtoCompras()
    {
        return $this->belongsToMany(Produto::class, 'compra_produtos', 'produtos_id', 'compras_id')
            ->withPivot('quantidade, preco')
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
