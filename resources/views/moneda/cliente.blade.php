@extends('layouts.app')
@section('content')
    <!-- CSS -->
    <!-- Bootstrap -->

    <!-- CSS propios -->
    {{-- <link href="{{ asset('assets/css/bienvenida/bienvenida.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="contenedorCliente">
        <h1 class="tituloDorado">QUANTUM</h1>
        <table class="table bg-dark">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th><span class="textoBlanco">COMPRA</span>
                        <span class="textoDorado">BUY</span>
                    </th>
                    <th><span class="textoBlanco">VENTA</span>
                        <span class="textoDorado">SALE</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monedas as $moneda)
                    <tr>
                        <td class="iconoTabla">
                            @if ($moneda->Tipo == 'Dólar')
                                <img class="iconoMoneda" src="{{ asset('img/dolar.png') }}" alt="Dólar">
                            @elseif ($moneda->Tipo == 'Euro')
                                <img class="iconoMoneda" src="{{ asset('img/euro.png') }}" alt="Euro">
                            @elseif ($moneda->Tipo == 'Real')
                                <img class="iconoMoneda" src="{{ asset('img/real.png') }}" alt="Real">
                            @elseif ($moneda->Tipo == 'Peso argentino')
                                <img class="iconoMoneda" src="{{ asset('img/arg.png') }}" alt="Peso argentino">
                            @elseif ($moneda->Tipo == 'Moneda oro')
                                <img class="iconoMoneda" src="{{ asset('img/oro.png') }}" alt="Moneda oro">
                            @elseif ($moneda->Tipo == 'Moneda plata')
                                <img class="iconoMoneda" src="{{ asset('img/plata.png') }}" alt="Moneda plata">
                            @elseif($moneda->Tipo == 'Peso colombiano')
                                <img class="iconoMoneda" src="{{ asset('img/colombiano.png') }}" alt="Peso colombiano">
                            @else
                                <img class="iconoMoneda" src="{{ asset('img/otra-moneda.png') }}" alt="Otra moneda">
                            @endif
                        </td>
                        <td class="datoTipo">{{ $moneda->Tipo }}</td>
                        <td class="datoNumero">{{ $moneda->Comprar }}</td>
                        <td class="datoNumero">{{ $moneda->Vender }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $monedas->links() !!}
    </div>
@endsection
