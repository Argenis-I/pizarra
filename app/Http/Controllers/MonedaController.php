<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monedas = Moneda::all();
        $datos['monedas'] = Moneda::paginate(9);
        return view('moneda.index', $datos, compact('monedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'comprar' => 'required|string|max:50',
            'vender' => 'required|string|max:50',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosMoneda = request()->except('_token');
        Moneda::insert($datosMoneda);

        return redirect('moneda')->with('mensaje', 'Moneda agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function show(Moneda $moneda)
    {
        //
    }

    public function cliente()
    {
        $monedas = Moneda::paginate(9);
        return view('moneda.cliente', compact('monedas')); // pasar las monedas a la vista otraVista
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moneda = Moneda::findOrFail($id);
        return view('moneda.edit', compact('moneda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'comprar' => 'required|string|max:50',
            'vender' => 'required|string|max:50',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosMoneda = request()->except(['_token', '_method']);
        Moneda::where('id', '=', $id)->update($datosMoneda);
        $moneda = Moneda::findOrFail($id);

        return redirect('moneda')->with('mensaje', 'Moneda Modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moneda  $moneda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moneda::destroy($id);

        return redirect('moneda')->with('mensaje', 'Moneda Borrada con exito');
    }
}
