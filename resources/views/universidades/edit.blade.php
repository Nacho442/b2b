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
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('universidades.update',$universidad->id) }}" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card ">
                            <div class="card-header card-header-warning card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">EDITAR UNIVERSIDAD</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Folio" value="{{$universidad->nombre}}" id="nombre" name="nombre" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombre" value="{{$universidad->telefono}}" id="telefono" name="telefono">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Calle" value="{{$universidad->calle}}" id="calle" name="calle">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Numero" value="{{$universidad->numero}}" id="numero" name="numero">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Colonia" value="{{$universidad->colonia}}" id="colonia" name="colonia">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ciudad" value="{{$universidad->ciudad}}" id="ciudad" name="ciudad">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Estado" value="{{$universidad->estado}}" id="estado" name="estado">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Descripcion" value="{{$universidad->descripcion}}" id="descripcion" name="descripcion">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Horario" value="{{$universidad->horarop}}" id="horario" name="horario">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-warning" href="{{ route('universidades.index') }}"><i class="material-icons">arrow_back</i> Atrás</a>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-warning" type="submit"><i class="material-icons">save</i > Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
@endsection