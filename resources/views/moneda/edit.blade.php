@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/moneda/'.$moneda->id ) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('moneda.form', ['modo'=>'Editar'])
</form>
</div>
@endsection
