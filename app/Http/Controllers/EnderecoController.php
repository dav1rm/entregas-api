<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Validator;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enderecos = Endereco::all();
        return response()->json($enderecos);
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
            'cep' => 'nullable|string',
            'rua' => 'required|string',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'complemento' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $endereco = Endereco::create($request->all());

        return response()->json($endereco, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endereco = Endereco::find($id);

        if(!$endereco)
            return response()->json(['message'   => 'Endereco não encontrado'], 404);

        return response()->json($endereco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cep' => 'nullable|string',
            'rua' => 'nullable|string',
            'numero' => 'nullable|integer',
            'bairro' => 'nullable|string',
            'cidade' => 'nullable|string',
            'estado' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'complemento' => 'nullable|string'
        ]);
        $endereco = Endereco::find($id);

        if(!$endereco) {
            return response()->json(['message'   => 'Endereco não encontrado'], 404);
        }

        $endereco->update($request->all());

        return response()->json($endereco);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = Endereco::find($id);

        if(!$endereco) {
            return response()->json(['message'   => 'Endereco não encontrado'], 404);
        }
        if($endereco->delete()) {
            return response()->json(['message'   => 'Endereco excluído com sucesso'], 200);
        }
    }
}
