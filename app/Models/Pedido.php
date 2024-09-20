<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];

    use HasFactory;

    public function pedido_produto(){
        return $this->hasMany('App\Models\PedidoProduto')
        ->select(\DB::raw('produto_id, sum(price) as prices, count(1) as qtd'))
        ->groupBy('produto_id', 'pedido_id')
        ->orderBy('produto_id', 'desc');
    }

    public static function consultaId($where){
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
    }
}
