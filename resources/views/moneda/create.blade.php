@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/moneda') }}" method="post">
@csrf
@include('moneda.form', ['modo'=>'Crear'])

</form>
</div>
@endsection
