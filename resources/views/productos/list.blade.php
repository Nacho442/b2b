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
                                <i class="material-icons">restaurant</i>
                            </div>
                            <h4 class="card-title ">PRODUCTOS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Folio</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        @if($productos->count())  
                                        @foreach($productos as $producto) 
                                        <tr>
                                            <td>{{$producto->folio}}</td>
                                            <td>{{$producto->nombre}}</td>
                                            <td>{{$producto->precio}}</td>
                                            <td>{{$producto->descripcion}}</td>
                                            <td>
                                                <a href="{{action('ProductosController@show', $producto->id)}}">
                                                <button class="btn btn-warning btn-sm"><i class="material-icons">remove_red_eye</i>
                                                </button>
                                            </a>
                                            @if(Auth::user()->id == $producto->id_usuario)
                                            <a href="{{action('ProductosController@edit', $producto->id)}}">
                                                <button class="btn btn-warning btn-sm"><i class="material-icons">edit</i></button>
                                            </a>
                                                <button class="btn btn-danger btn-sm" onclick="baja({{$producto->id}})"><i class="material-icons">clear</i></button>
                                            @endif
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
                                {{ $productos->render() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('productos.create') }}">
                        <button class="btn btn-warning"><i class="material-icons">add</i>Agregar producto</button>
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
                url: '/productos/baja/'+id,
                type: 'GET',
                success: function (proy) {
                    location.reload();
            },
        });
    }
</script>
@endsection