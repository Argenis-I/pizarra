<h1>{{ $modo }} moneda</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as$error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="form-group">
    <label for="tipo" class="textoBlanco">Tipo: </label>
    <input type="text" class="inputMedida form-control" name="tipo" value="{{ isset($moneda->Tipo)?$moneda->Tipo:old('tipo') }}" id="tipo">
    </div>

<div class="form-group">
<label for="comprar" class="textoBlanco">Compra: </label>
<input type="text" class="inputMedida form-control" name="comprar" value="{{ isset($moneda->Comprar)?$moneda->Comprar:old('comprar') }}" id="comprar">
</div>

<div class="form-group">
<label for="vender" class="textoBlanco">Venta: </label>
<input type="text" class="inputMedida form-control" name="vender" value="{{ isset($moneda->Vender)?$moneda->Vender:old('vender') }}" id="vender">
</div>
<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('moneda/')}}">Regresar</a>
