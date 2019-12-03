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
                    <form method="POST" action="{{ route('users.passwordnuevo',Auth::user()->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card ">
                            <div class="card-header card-header-warning card-header-text">
                                <div class="card-text">
                                    <h4 class="card-title">CAMBIAR PASSWORD</h4>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Nuevo Password" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="btn btn-warning" href="{{ route('dashboard.index') }}"><i class="material-icons">arrow_back</i> Atrás</a>
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