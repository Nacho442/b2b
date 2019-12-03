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
                        <div class="card-header card-header-icon card-header-success">
                            <div class="card-icon">
                                <i class="material-icons">folder_shared</i>
                            </div>
                            <h4 class="card-title ">ARCHIVO CLÍNICO</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Folio</th>
                                        <th>Nombre</th>
                                        <th>Ultima cita</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>0001</td>
                                            <td>Arumi González</td>
                                            <td>01/01/19</td>
                                            
                                            <td><a href="archivopaciente.html">
                                                <button class="btn btn-success btn-sm"><i class="material-icons">folder_shared</i></button>
                                            </a>
                                                <button class="btn btn-success btn-sm"><i class="material-icons">edit</i></button>
                                            
                                                <button class="btn btn-danger btn-sm"><i class="material-icons">clear</i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>0002</td>
                                            <td>Vania Basaldúa</td>
                                            <td>01/01/19</td>
                                            
                                              <td><a href="archivopaciente.html">
                                                <button class="btn btn-success btn-sm"><i class="material-icons">folder_shared</i></button>
                                            </a>
                                                <button class="btn btn-success btn-sm"><i class="material-icons">edit</i></button>
                                            
                                                <button class="btn btn-danger btn-sm"><i class="material-icons">clear</i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
@endsection