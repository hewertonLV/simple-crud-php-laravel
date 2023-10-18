<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected Product $product,
    )
    {
    }

    public function index()
    {
        $products = Product::all();
        return view('pages.index')->with(['products' => $products ?? []]);
    }

    public function store(Request $request)
    {

        $this->product->validate($request);
        $this->product->fill($request->input());

        if ($this->product->save()) {
            toastr()->success('Produto cadastrado.', 'Operação Realizada');
            return redirect()->route('indexProduct');
        }
        toastr()->error('Falha ao cadastrar o produto.', 'Operação Falhou');
        return redirect()->route('indexProduct');
    }

    public function edit(Request $request)
    {
        $produto = $this->product->find($request->id);
        $produto->fill($request->input());
        if ($produto->save()) {
            toastr()->success('Produto Atualizado.', 'Operação Realizada');
            return redirect()->route('indexProduct');
        }
        toastr()->error('Falha ao editar o Produto ', 'Operação Falhou');
        return redirect()->route('indexProduct');
    }


    public function destroy(Request $request)
    {
        $produto = $this->product->find($request->id);
        if ($produto) {
            $produto->delete();
            toastr()->success('Produto Excluido.', 'Operação Realizada');
            return redirect()->route('indexProduct');
        }
        toastr()->error('O produto não existe.', 'Operação Falhou');
        return redirect()->route('indexProduct');
    }


}
