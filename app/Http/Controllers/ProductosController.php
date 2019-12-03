<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Producto;
use App\PuntoVenta;
use App\Universidad;

class ProductosController extends Controller
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
            $productos = Producto::where('activo',1)->orderBy('id','DESC')->paginate(10);
        }else{
            $productos = Producto::where([['id_usuario',Auth::user()->id],['activo',1]])->orderBy('id','DESC')->paginate(10);
        }
        return view('productos.list',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $folio=Producto::orderBy('folio','DESC')->first();
        if (empty($folio)) {
            $fo = '1001';
        }else{
        $fo = (int)$folio->folio + 1;
        }
        $universidades = Universidad::where('activo',1)->get();
        return view('productos.create',compact('fo','universidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        //
        $date = date('Y-m-d H:i:s');
        //$file_name = 'default.jpg';
        if ($request->hasFile('foto')) {
            //dd('entro if');
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/fotosproductos/'.$request->folio.'/', $name);
            $file_name = $name;
        }
        $id_producto = Producto::insertGetId(['folio' => $request->folio,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'id_universidad' => $request->id_universidad,
            'id_usuario' => Auth::user()->id,
            'activo' => 1,
            'created_at' => $date, 
            'updated_at' => $date]);

        $data = \DB::table('fotos_productos')->insert([
            'foto' => $file_name,
            'estatus' => 'Pendiente',
            'id_producto' => $id_producto,
            'id_usuario' => Auth::user()->id,
            'activo' => 1,
            'created_at' => $date, 
            'updated_at' => $date
            ]);

        if($data == true){
            return redirect()->route('productos.index');
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
        $producto = Producto::select('productos.*','fotos_productos.estatus','fotos_productos.id_producto','fotos_productos.foto as foto_producto','universidades.id as id_u','universidades.nombre as nombre_u')
        ->join('fotos_productos','productos.id','=','fotos_productos.id_producto')
        ->join('universidades','productos.id_universidad','=','universidades.id')
        ->where('productos.id',$id)
        ->first();
        return view('productos.show',compact('producto'));
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
        $producto = Producto::where('id',$id)->first();
        return view('productos.edit',compact('producto','universidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        //
        $file_name = null;
        if ($request->hasFile('foto')) {
            //dd('entro if');
            $file = $request->file('foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/fotosproductos/'.$request->folio.'/', $name);
            $file_name = $name;
        }
        $data = Producto::where('id',$id)->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'id_universidad' => $request->id_universidad,
        ]);
        if($file_name != null){
            $data1 = \DB::table('fotos_productos')->where('id_producto',$id)->update([
                'foto' => $file_name,
                'estatus' => 'Pendiente',
            ]);
        }

        if($data == true){
            return redirect()->route('productos.index');
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
        $data = Producto::where('id',$id)->update([
            'activo' => 0
        ]);

        if($data == true){
            return redirect()->route('productos.index');
        }
    }
}
