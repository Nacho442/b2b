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
                <div class="class-md-12" style="margin-left: 5%"><h2>ESCRITORIO VENDEDOR</h2></div>
            </div>
	        
	        @include('layouts.footer')
	    </div>
	</div>
</div>
@endsection