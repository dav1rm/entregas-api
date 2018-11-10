<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;
use Validator;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagamentos = Pagamento::all();
        return response()->json($pagamentos);
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
            'tipo' => 'required|string',
            'valor' => 'required|numeric',
            'descricao' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $pagamento = Pagamento::create($request->all());

        return response()->json($pagamento, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagamento = Pagamento::find($id);

        if(!$pagamento)
            return response()->json(['message'   => 'Pagamento não encontrado'], 404);

        return response()->json($pagamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo' => 'nullable|string',
            'valor' => 'nullable|numeric',
            'descricao' => 'nullable|string',
        ]);
        $pagamento = Pagamento::find($id);

        if(!$pagamento) {
            return response()->json(['message'   => 'Pagamento não encontrado'], 404);
        }

        $pagamento->update($request->all());

        return response()->json($pagamento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pagamento = Pagamento::find($id);

        if(!$pagamento) {
            return response()->json(['message'   => 'Pagamento não encontrado'], 404);
        }
        if($pagamento->delete()) {
            return response()->json(['message'   => 'Pagamento excluído com sucesso'], 200);
        }
    }
}
