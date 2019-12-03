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
                    <form method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card ">
                            <div class="card-header card-header-warning card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">AGREGAR USUARIO</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" placeholder="Folio" value="{{$user->folio}}" id="folio" name="folio" onlyread>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombre" value="{{$user->name}}" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="A. Paterno" value="{{$user->a_paterno}}" id="a_paterno" name="a_paterno">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="A. Materno" value="{{$user->a_materno}}" id="a_materno" name="a_materno">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Correo" value="{{$user->email}}" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="rol" id="rol">
                                                <option value="">Rol</option>
                                                <option value="Administrador" <?php if($user->rol == 'Administrador'){?> selected <?php } ?>>Administrador</option>
                                                <option value="Vendedor" <?php if($user->rol == 'Vendedor'){?> selected <?php } ?>>Vendedor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select class="form-control" name="id_universidad" id="id_universidad">
                                                <option value="">Universidad</option>
                                                @foreach($universidades as $universidad)
                                                    <option value="{{ $universidad->id }}" <?php if($user->id_universidad == $universidad->id){?> selected <?php } ?>>{{ $universidad->nombre }}</option>
                                                @endforeach
                                            </select>
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
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-warning" href="{{ route('users.index') }}"><i class="material-icons">arrow_back</i> Atrás</a>
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
<script type="text/javascript">
    document.getElementById('foto').onchange = function () {
        //console.log(this.value);
        document.getElementById('label_foto').innerHTML = document.getElementById('foto').files[0].name;
    }
</script>
@endsection