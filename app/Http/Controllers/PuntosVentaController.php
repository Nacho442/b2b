<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PuntoVentaRequest;
use App\PuntoVenta;
use App\Universidad;

class PuntosVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->rol == 'Administrador'){
            $puntosventa = PuntoVenta::select('puntos_venta.*','universidades.id as id_u','universidades.nombre as nombre_u')
            ->join('universidades','puntos_venta.id_universidad','=','universidades.id')
            ->where('puntos_venta.activo',1)
            ->orderBy('id','DESC')->paginate(10);
        }else{
            $puntosventa = PuntoVenta::select('puntos_venta.*','universidades.id as id_u','universidades.nombre as nombre_u')
            ->join('universidades','puntos_venta.id_universidad','=','universidades.id')
            ->where([['id_usuario',Auth::user()->id],['puntos_venta.activo',1]])
            ->orderBy('id','DESC')->paginate(10);
        }
        return view('puntosventa.list',compact('puntosventa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $folio=PuntoVenta::orderBy('folio','DESC')->first();
        if (empty($folio)) {
            $fo = '1001';
        }else{
        $fo = (int)$folio->folio + 1;
        }
        $universidades = Universidad::where('activo',1)->get();
        return view('puntosventa.create',compact('fo','universidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuntoVentaRequest $request)
    {
        //
        $date = date('Y-m-d H:i:s');


        if(Auth::user()->rol != 'Administrador') {
            $dataR = PuntoVenta::where('id_usuario',Auth::user()->id)->first();
            if($dataR == null){
                $data = PuntoVenta::insert(['folio' => $request->folio,
                    'nombre' => $request->nombre,
                    'telefono' => $request->telefono,
                    'id_universidad' => $request->id_universidad,
                    'id_usuario' => Auth::user()->id,
                    'activo' => 1,
                    'created_at' => $date, 
                    'updated_at' => $date]);

                if($data == true){
                    return redirect()->route('puntosventa.index');
                }
            }else{
                return redirect()->route('puntosventa.index')->with('alert', 'No puedes registrar mas de un punto de venta!');
            }
        }else{
            $data = PuntoVenta::insert(['folio' => $request->folio,
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'id_universidad' => $request->id_universidad,
                'id_usuario' => Auth::user()->id,
                'activo' => 1,
                'created_at' => $date, 
                'updated_at' => $date]);

            if($data == true){
                return redirect()->route('puntosventa.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $puntoventa = PuntoVenta::select('puntos_venta.*','universidades.id as id_uni','universidades.nombre as nombre_u')
        ->join('universidades','puntos_venta.id_universidad','=','universidades.id')
        ->where('puntos_venta.id',$id)
        ->first();
        return view('puntosventa.show',compact('puntoventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $puntoventa = PuntoVenta::where('id',$id)->first();
        $universidades = Universidad::where('activo',1)->get();
        return view('puntosventa.edit',compact('puntoventa','universidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PuntoVentaRequest $request, $id)
    {
        //
        $data = PuntoVenta::where('id',$id)->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'id_universidad' => $request->id_universidad,
        ]);
        if($data == true){
            return redirect()->route('puntosventa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function baja($id)
    {
        $data = PuntoVenta::where('id',$id)->update([
            'activo' => 0
        ]);

        if($data == true){
            return redirect()->route('puntosventa.index');
        }
    }
}
