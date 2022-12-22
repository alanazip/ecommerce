<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;
    protected $fillable = ['nome', 'descricao'];

    public function produto()
    {
        return $this->belongsTo('Produto', 'produto_id');
    }
}
