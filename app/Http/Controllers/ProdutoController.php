<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Validator;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string',
            'valor' => 'required|numeric',
            'entrega_id' => 'nullable|integer'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $produto = Produto::create($request->all());

        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if(!$produto)
            return response()->json(['message'   => 'Produto não encontrado'], 404);

        return response()->json($produto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'nullable|string',
            'valor' => 'nullable|numeric',
            'entrega_id' => 'nullable|integer'
        ]);
        $produto = Produto::find($id);

        if(!$produto) {
            return response()->json(['message'   => 'Produto não encontrado'], 404);
        }

        $produto->update($request->all());

        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if(!$produto) {
            return response()->json(['message'   => 'Produto não encontrado'], 404);
        }
        if($produto->delete()) {
            return response()->json(['message'   => 'Produto excluído com sucesso'], 200);
        }
    }
}
