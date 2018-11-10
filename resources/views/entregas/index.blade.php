@extends('base')

@section('content')
@forelse ($entregas as $entrega)
    <li>Status: {{ $entrega->status }} - Vendedor: {{ $entrega->vendedor->name }} - valor: {{ $entrega->valor }}</li>
@empty
    <p>Nenhuma entrega cadastrada.</p>
@endforelse
@endsection
