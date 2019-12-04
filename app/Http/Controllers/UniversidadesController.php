<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UniversidadRequest;
use App\Universidad;


class UniversidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $universidades = Universidad::where('activo',1)->orderBy('id','DESC')->paginate(10);
        return view('universidades.list',compact('universidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('universidades.create',compact('fo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversidadRequest $request)
    {
        //
        $date = date('Y-m-d H:i:s');
        $file = $request->file('foto');
        $name = $file->getClientOriginalName();
        $file->move(public_path().'/fotosproductos/'.$request->id.'/', $name);
        $file_name = 'fotosproductos/'.$request->id.'/'.$name;
        $data = Universidad::insert([
            'nombre' => $request->nombre,
            'calle' => $request->calle,
            'numero' => $request->numero,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'activo' => 1,
            'foto' => $file_name,
            'telefono' => $request->telefono,
            'created_at' => $date, 
            'updated_at' => $date,
            'descripcion'=> $request->descripcion,
            'horario' => $request->horario]);

        if($data == true){
            return redirect()->route('universidades.index');
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
        $universidad = Universidad::find($id);
        return view('universidades.show',compact('universidad'));
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
        $universidad = Universidad::where('id',$id)->first();
        return view('universidades.edit',compact('universidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UniversidadRequest $request, $id)
    {
        //
        $data = Universidad::where('id',$id)->update([
            'nombre' => $request->nombre,
            'calle' => $request->calle,
            'numero' => $request->numero,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
            'estado' => $request->estado,
            'updated_at' => $date,
        ]);
        if($data == true){
            return redirect()->route('universidades.index');
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
        $data = Universidad::where('id',$id)->update([
            'activo' => 0
        ]);

        if($data == true){
            return redirect()->route('universidades.index');
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }
}
