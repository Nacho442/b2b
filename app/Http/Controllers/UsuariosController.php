<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Universidad;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios = User::where('activo','=',1)->orderBy('id','DESC')->paginate(10);
        return view('users.list',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $folio=User::orderBy('folio','DESC')->first();
        if (empty($folio)) {
            $fo = '1001';
        }else{
        $fo = (int)$folio->folio + 1;
        }
        $universidades = Universidad::where('activo',1)->get();
        return view('users.create',compact('fo','universidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $date = date('Y-m-d H:i:s');
        $file_name = 'default.jpg';
        if ($request->hasFile('foto')) {
            //dd('entro if');
            $file = $request->file('foto');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/fotosusers/'.$request->email.'/', $name);
            $file_name ='fotosusers/'.$request->email.'/'.$name;
        }
        $data = User::insert(['folio' => $request->folio,
            'name' => $request->name,
            'a_paterno' => $request->a_paterno,
            'a_materno' => $request->a_materno,
            'foto' => $file_name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'rol' => $request->rol,
            'id_universidad' => $request->id_universidad,
            'activo' => 1,
            'created_at' => $date, 
            'updated_at' => $date]);

        if($data == true){
            return redirect()->route('users.index');
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
        $usuario = User::where('id',$id)->first();
        $universidad = Universidad::select('nombre')->where('id','=',$usuario->id_universidad)->first();
        return view('users.show',compact('usuario','universidad'));
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
        $user = User::where('id',$id)->first();
        $universidades = Universidad::where('activo',1)->get();
        return view('users.edit',compact('user','universidades'));
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
            $file->move(public_path().'/fotosusers/'.$request->folio.'/', $name);
            $file_name = $name;
        }
        if($request->password != null){
            if($file_name != null){
                $data = User::where('id',$id)->update([
                    'name' => $request->name,
                    'a_paterno' => $request->a_paterno,
                    'a_materno' => $request->a_materno,
                    'email' => $request->email,
                    'rol' => $request->rol,
                    'id_universidad' => $request->id_universidad,
                    'password' => password_hash($request->password, PASSWORD_BCRYPT),
                    'foto' => $file_name,
                ]);
            }else{
                $data = User::where('id',$id)->update([
                    'name' => $request->name,
                    'a_paterno' => $request->a_paterno,
                    'a_materno' => $request->a_materno,
                    'email' => $request->email,
                    'rol' => $request->rol,
                    'id_universidad' => $request->id_universidad,
                    'password' => password_hash($request->password, PASSWORD_BCRYPT),
                ]);
            }
        }else{
            if($file_name != null){
                $data = User::where('id',$id)->update([
                    'name' => $request->name,
                    'a_paterno' => $request->a_paterno,
                    'a_materno' => $request->a_materno,
                    'email' => $request->email,
                    'rol' => $request->rol,
                    'id_universidad' => $request->id_universidad,
                    'foto' => $file_name,
                ]);
            }else{
                $data = User::where('id',$id)->update([
                    'name' => $request->name,
                    'a_paterno' => $request->a_paterno,
                    'a_materno' => $request->a_materno,
                    'email' => $request->email,
                    'rol' => $request->rol,
                    'id_universidad' => $request->id_universidad,
                ]);
            }
        }
        if($data == true){
            return redirect()->route('users.index');
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
        $data = User::where('id',$id)->update([
            'activo' => 0
        ]);

        if($data == true){
            return redirect()->route('users.index');
        }
    }

    public function password(){
        return view('users.pass');
    }

    public function passwordnuevo(Request $request, $id){
        $data = User::where('id',$id)->update([
            'password' => password_hash($request->password, PASSWORD_BCRYPT)
        ]);

        if($data == true){
            auth()->logout();

            return redirect()->route('login');
        }
    }
}
