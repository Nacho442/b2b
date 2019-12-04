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
                                @if(Auth::user()->foto != null)
                                    <img src="{{ url('fotosusers/'.Auth::user()->id, Auth::user()->foto) }}" class="logorocio"/>
                                @else
                                    <img src="{{ asset("$usuario->foto") }}" class="logorocio"/>
                                @endif
                            </div>
                            <h4 class="card-title ">DETALLE USUARIO</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;">Nombre</td>
                                            <td>{{$usuario->name}} {{$usuario->a_paterno}} {{$usuario->a_materno}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Correo</td>
                                            <td>{{$usuario->email}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Rol</td>
                                            <td>{{$usuario->rol}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Fecha de creacion</td>
                                            <td>{{$usuario->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Ultima fecha de modificacion</td>
                                            <td>{{$usuario->updated_at}}</td>
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
                    <a href="{{ route('users.index') }}"><button class="btn btn-warning"><i class="material-icons">arrow_back</i> Atrás</button></a>
                </div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
@endsection