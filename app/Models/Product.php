<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'amount'];

    public function attributes(): array
    {
        return [
            'name' => 'Nome do produto',
            'description' => 'Descrição do produto',
            'price' => 'Preço do produto',
            'amount' => 'Quantidade do produto'
        ];
    }

    public function validate($object): array
    {
        return $object->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'amount' => 'required',
        ]);
    }

    public function inputs($product): array
    {
        return [
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'amount' => $product->amount,
        ];
    }

    private static function find($id)
    {
        return Product::where('id',$id)->get();
    }

    public function label()
    {
        return $this->buyerName;
    }

    public function value()
    {
        return $this->id;
    }

    use SoftDeletes;
}
