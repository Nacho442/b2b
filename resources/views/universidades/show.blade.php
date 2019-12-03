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
                            <h4 class="card-title ">DETALLE EMPRESA</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;">Nombre de la empresa</td>
                                            <td>{{$universidad->nombre}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Telefono</td>
                                            <td>{{$universidad->telefono}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Direccion</td>
                                            <td>{{$universidad->calle}} #{{$universidad->numero}}, {{$universidad->colonia}}, {{$universidad->ciudad}}, {{$universidad->esatdo}}</td>
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
                    <a href="{{ route('universidades.index') }}"><button class="btn btn-warning"><i class="material-icons">arrow_back</i> Atrás</button></a>
                </div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
@endsection