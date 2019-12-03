@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
		<form method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}             
			<div class="card card-login card-hidden">
				<div class="card-header">
					<div class="logo">
			            <img src="{{ asset("assets/img/logo.png") }}" class="logorocio"/>
			        </div>
				</div>
				<div class="card-body ">
					<div class="form-group">
						<label for="email">Email</label>
						<input class="form-control" type="email" name="email" placeholder="Ingresa tu email">
					</div>
					<div class="form-group">
						<label for="password">Contraseña</label>
						<input class="form-control" type="password" name="password" placeholder="Ingresa tu password">
					</div>
				</div>
				<div class="card-footer justify-content-center">
					<button class="btn btn-fill btn-block btn-warning">Acceder</button>
				</div>
			</div>
		</form>
		<div class="alert alert-danger" id="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              	<i class="material-icons">close</i>
            </button>
            <span id="mensaje"></span>
        </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#alert").hide();
	    var msg = '{{Session::get('alert')}}';
	    var exist = '{{Session::has('alert')}}';
	    document.getElementById('mensaje').innerHTML = msg;
	    if(exist){
	    	$("#alert").show();
	      	//alert(msg);
	    }
    });
 </script>	
@endsection