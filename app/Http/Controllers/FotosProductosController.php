<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class FotosProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fotos = \DB::table('fotos_productos')->select('fotos_productos.id','productos.nombre')
        ->join('productos','fotos_productos.id_producto','=','productos.id')
        ->where('fotos_productos.estatus','LIKE','%Pendiente%')
        ->orderBy('id','DESC')->paginate(10);
        return view('fotosproductos.list',compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $foto = \DB::table('fotos_productos')->select('fotos_productos.id','fotos_productos.foto as foto_producto','productos.folio','productos.nombre','users.name','users.a_paterno','users.a_materno')
        ->join('productos','fotos_productos.id_producto','=','productos.id')
        ->join('users','fotos_productos.id_usuario','=','users.id')
        ->where('fotos_productos.id','=',$id)
        ->first();
        return view('fotosproductos.show',compact('foto'));
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
        $foto = \DB::table('fotos_productos')->select('fotos_productos.id','fotos_productos.foto as foto_producto','productos.folio','productos.nombre','users.name','users.a_paterno','users.a_materno')
        ->join('productos','fotos_productos.id_producto','=','productos.id')
        ->join('users','fotos_productos.id_usuario','=','users.id')
        ->where('fotos_productos.id','=',$id)
        ->first();
        return view('fotosproductos.edit',compact('foto'));
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
        $data = \DB::table('fotos_productos')->where('id',$id)->update([
            'estatus' => $request->estatus,
        ]);

        if($data == true){
            return redirect()->route('fotos-productos.index');
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
}
