@extends('layouts.app')
@section('content')
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ url('moneda/create') }}" class="btn btn-success">Nueva Moneda</a>
        <br>
        <br>
        <h1 class="tituloDorado">Lista de divisas</h1>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Compra</th>
                    <th>Venta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monedas as $moneda)
                    <tr>
                        <td>{{ $moneda->id }}</td>
                        <td>{{ $moneda->Tipo }}</td>
                        <td>{{ $moneda->Comprar }}</td>
                        <td>{{ $moneda->Vender }}</td>
                        <td>
                            <a href="{{ url('/moneda/' . $moneda->id . '/edit') }}" class="btn btn-warning">Editar </a>
                            |
                            <form action="{{ url('/moneda/' . $moneda->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿ De verdad deseas borrarlo ?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $monedas->links() !!}
    </div>
@endsection
