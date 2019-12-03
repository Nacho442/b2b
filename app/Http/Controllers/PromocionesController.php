<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PromocionesRequest;
use App\Promociones;
use App\Universidad;

class PromocionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promociones = Promociones::where('activo',1)->orderBy('id','DESC')->paginate(10);
        return view('promociones.list',compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $folio=Promociones::orderBy('folio','DESC')->first();
        if (empty($folio)) {
            $fo = '1001';
        }else{
        $fo = (int)$folio->folio + 1;
        }
        $universidades = Universidad::where('activo',1)->get();
        return view('promociones.create',compact('fo','universidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromocionesRequest $request)
    {
        //
        $date = date('Y-m-d H:i:s');
        $file_name = null;
        if ($request->hasFile('foto')) {
            //dd('entro if');
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/fotospromociones/'.$request->folio.'/', $name);
            $file_name = $name;
        }
        $data = Promociones::insertGetId(['folio' => $request->folio,
            'promocion' => $request->promocion,
            'descripcion' => $request->descripcion,
            'id_universidad' => $request->id_universidad,
            'foto' => $file_name,
            'activo' => 1,
            'created_at' => $date, 
            'updated_at' => $date]);

        if($data == true){
            return redirect()->route('promociones.index');
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
        $promocion = Promociones::select('promociones.*','universidades.id as id_u','universidades.nombre as nombre_u')
        ->join('universidades','promociones.id_universidad','=','universidades.id')
        ->where('promociones.id',$id)
        ->first();
        return view('promociones.show',compact('promocion'));
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
        $universidades = Universidad::where('activo',1)->get();
        $promocion = Promociones::where('id',$id)->first();
        return view('promociones.edit',compact('promocion','universidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $file_name = null;
        if ($request->hasFile('foto')) {
            //dd('entro if');
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/fotospromociones/'.$request->folio.'/', $name);
            $file_name = $name;
        }
        $data = Promociones::where('id',$id)->update([
            'promocion' => $request->promocion,
            'descripcion' => $request->descripcion,
            'id_universidad' => $request->id_universidad
        ]);
        if($file_name != null){
            $data1 = Promociones::where('id',$id)->update([
                'foto' => $file_name
            ]);
        }

        if($data == true){
            return redirect()->route('promociones.index');
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
        $data = Promociones::where('id',$id)->update([
            'activo' => 0
        ]);

        if($data == true){
            return redirect()->route('promociones.index');
        }
    }
}
