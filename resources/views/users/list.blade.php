@extends('layouts.layout')

@section('content')
@include('layouts.menu')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<div class="main-panel">
	@include('layouts.barra')
	<div class="content">
	    <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-warning">
                            <div class="card-icon">
                                <i class="material-icons">work</i>
                            </div>
                            <h4 class="card-title ">EMPRESAS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                    </thead>
                                    <tbody>
                                        @if($usuarios->count())  
                                        @foreach($usuarios as $usuario) 
                                        <tr>
                                            <td>{{$usuario->folio}}</td>
                                            <td>{{$usuario->name}} {{$usuario->a_paterno}} {{$usuario->a_materno}}</td>
                                            <td>{{$usuario->rol}}</td>
                                            <td>
                                                <a href="{{action('UsuariosController@show', $usuario->id)}}">
                                                <button class="btn btn-warning btn-sm"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            <a href="{{action('UsuariosController@edit', $usuario->id)}}">
                                                <button class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button>
                                            </a>
                                                <button class="btn btn-danger btn-sm" onclick="baja({{$usuario->id}})"><i class="material-icons">clear</i></button>
                                            </td>
                                        </tr>
                                        @endforeach 
                                        @else
                                        <tr>
                                            <td colspan="4">No hay registro !!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $usuarios->render() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('users.create') }}">
                        <button class="btn btn-warning"><i class="material-icons">add</i>Agregar Usuarios</button>
                    </a>
                </div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
<script type="text/javascript">
    function baja(id){
        $.ajax({
                url: '/users/baja/'+id,
                type: 'GET',
                success: function (proy) {
                    location.reload();
            },
        });
    }
</script>
@endsection