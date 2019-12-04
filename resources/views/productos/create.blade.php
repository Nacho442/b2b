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
                    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="card ">
                            <div class="card-header card-header-warning card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">AGREGAR PRODUCTO</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Precio" id="precio" name="precio" step="any">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="categoria" id="categoria">
                                                <option value="">Categoria</option>
                                                <option value="Salud y Belleza">Salud y Belleza</option>
                                                <option value="Ropa y Accesorios">Ropa y Accesorios</option>
                                                <option value="Restaurant">Restaurant</option>
                                                <option value="Automoviles">Automoviles</option>
                                                <option value="Bares y Antros">Bares y Antros</option>
                                                <option value="Eventos">Eventos</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="id_universidad" id="id_universidad">
                                                <option value="">Empresa</option>
                                                @foreach($universidades as $empresa)
                                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Direccion" id="direccion" name="direccion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="field_image" class="form-group bmd-form-group">
                                            <label id="label_foto" for="foto" class="my-btn"></label>
                                            <label for="foto" class="btn btn-warning">
                                                <i class="material-icons">photo_camera</i> Foto
                                            </label>
                                            <input class="form-control" type="file" name="foto" id="foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="btn btn-warning" href="{{ route('productos.index') }}"><i class="material-icons">arrow_back</i> Atrás</a>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning" type="submit"><i class="material-icons">save</i > Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
<script type="text/javascript">
    document.getElementById('foto').onchange = function () {
        //console.log(this.value);
        document.getElementById('label_foto').innerHTML = document.getElementById('foto').files[0].name;
    }
</script>
@endsection