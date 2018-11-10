@extends('base')

@section('content')
<form  action="{{ url('/entregas/store') }}" method="POST">
    @csrf
  <div class="form-group">
    <label for="nome_cliente">Nome do cliente</label>
    <input type="text" class="form-control" name="nome_cliente" id="nome_cliente">
  </div>
  <div class="form-group">
    <label for="telefone_cliente">Telefone do cliente</label>
    <input type="text" class="form-control" name="telefone_cliente" id="telefone_cliente">
  </div>
  <div class="form-group">
    <label for="taxa">Taxa</label>
    <input type="text" class="form-control" id="taxa" name="taxa">
  </div>
  <div class="form-group">
    <label for="valor">Valor da entrega</label>
    <input type="text" class="form-control" id="valor" name="valor">
  </div>
  <button type="submit" class="btn btn-primary">Solicitar</button>
</form>
@endsection
