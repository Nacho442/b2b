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
                            <h4 class="card-title ">DETALLE PRODUCTO</h4>
                        </div>
                        <div class="card-body">
                            <div class="logo">
                                @if($producto->estatus == 'Pendiente')
                                <img src="{{ asset("assets/img/pendiente.png") }}" class="logorocio"/>
                                @endif
                                @if($producto->estatus == 'Autorizada')
                                <img src="{{ url('fotosproductos/'.+$producto->folio, $producto->foto_producto) }}" class="logorocio"/>
                                @endif
                                @if($producto->estatus == 'No Autorizada')
                                <img src="{{ asset("assets/img/no-autorizada.png") }}" class="logorocio"/>
                                @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;">Folio</td>
                                            <td>{{$producto->folio}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Nombre</td>
                                            <td>{{$producto->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Precio</td>
                                            <td>{{$producto->precio}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Categoria</td>
                                            <td>{{$producto->categoria}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Descripcion</td>
                                            <td>{{$producto->descripcion}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Universidad</td>
                                            <td>{{$producto->nombre_u}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('productos.index') }}"><button class="btn btn-warning"><i class="material-icons">arrow_back</i> Atrás</button></a>
                </div>
            </div>
            
            @include('layouts.footer')
        </div>
    </div>
</div>
@endsection