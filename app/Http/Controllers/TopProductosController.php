<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopProductos;
use App\Producto;

class TopProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = TopProductos::select('top_productos.*','productos.folio','productos.nombre','productos.precio')
        ->join('productos','top_productos.id_producto','=','productos.id')
        ->where('top_productos.activo',1)->orderBy('posicion','ASC')->get();
        return view('top_productos.list',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productos = Producto::where('activo',1)->get();
        return view('top_productos.create',compact('productos'));
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
        $date = date('Y-m-d H:i:s');
        $data = TopProductos::insert([
            'posicion' => $request->posicion,
            'id_producto' => $request->id_producto,
            'categoria' => $request->categoria,
            'activo' => 1,
            'created_at' => $date, 
            'updated_at' => $date]);

        if($data == true){
            return redirect()->route('topproductos.index');
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
        $producto = TopProductos::select('top_productos.*','productos.folio','productos.nombre','productos.precio','productos.categoria','productos.descripcion','fotos_productos.estatus','fotos_productos.foto as foto_producto','universidades.nombre as nombre_u')
        ->join('productos','top_productos.id_producto','=','productos.id')
        ->join('fotos_productos','productos.id','=','fotos_productos.id_producto')
        ->join('universidades','productos.id_universidad','=','universidades.id')
        ->where('top_productos.id',$id)
        ->first();
        return view('top_productos.show',compact('producto'));
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
        $topproducto = TopProductos::select('top_productos.*')->where('top_productos.id',$id)->first();
        $productos = Producto::where('activo',1)->get();
        return view('top_productos.edit',compact('topproducto','productos'));
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
        $data = TopProductos::where('id',$id)->update([
            'posicion' => $request->posicion,
            'id_producto' => $request->id_producto,
            'categoria' => $request->categoria
        ]);

        if($data == true){
            return redirect()->route('topproductos.index');
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
        $data = TopProductos::where('id',$id)->update([
            'activo' => 0,
        ]);

        if($data == true){
            return redirect()->route('topproductos.index');
        }
    }
}
