<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;
use Validator;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // List all deliveries with name and id from vendedor
        $entregas = Entrega::with('vendedor:id,name')->get();
        return response()->json($entregas);
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
            'pagamento' => 'required|string',
            'nome_cliente' => 'required|string',
            'telefone_cliente' => 'required|string',
            'valor' => 'required|numeric',
            'taxa' => 'required|numeric',
            'vendedor_id' => 'nullable|integer'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $entrega = Entrega::create($request->all());

        return response()->json($entrega, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrega = Entrega::find($id);

        if(!$entrega)
            return response()->json(['message'   => 'Entrega não encontrada'], 404);

        return response()->json($entrega);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pagamento' => 'nullable|string',
            'nome_cliente' => 'nullable|string',
            'telefone_cliente' => 'nullable|string',
            'valor' => 'nullable|numeric',
            'taxa' => 'nullable|numeric',
            'vendedor_id' => 'nullable|integer',
            'entregador_id' => 'nullable|integer'
        ]);
        $entrega = Entrega::find($id);

        if(!$entrega) {
            return response()->json(['message'   => 'Entrega não encontrada'], 404);
        }

        $entrega->update($request->all());

        return response()->json($entrega);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrega  $entrega
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrega = Entrega::find($id);

        if(!$entrega) {
            return response()->json(['message'   => 'Entrega não encontrada'], 404);
        }
        if($entrega->delete()) {
            return response()->json(['message'   => 'Entrega excluída com sucesso'], 200);
        }
    }
}
