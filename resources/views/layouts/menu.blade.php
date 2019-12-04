<div class="sidebar" data-color="white" data-background-color="white">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <img src="{{ asset("assets/img/logo.png") }}" class="logorocio"/>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                @if(Auth::user()->foto != null)
                    <img src="{{ url('fotosusers/'.Auth::user()->folio, Auth::user()->foto) }}"/>
                @else
                    <img src="{{ url('fotosusers/1000/default.jpg') }}"/>
                @endif
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{Auth::user()->name}} {{Auth::user()->a_paterno}} {{Auth::user()->a_materno}}
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="material-icons text-success">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('universidades.index') }}">
                    <i class="material-icons text-success" >work</i>
                    <p> Empresas </p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="material-icons text-success" ;">person</i>
                    <p> Usuarios </p>
                </a>
            </li>

            
            <!--<li class="nav-item">
                <a class="nav-link" href="{{ route('puntosventa.index') }}">
                    <i class="material-icons text-success" style="color: #EFD245;">storefront</i>
                    <p> Puntos Venta </p>
                </a>
            </li>-->
           
        </ul>
    </div>
</div>
<script type="text/javascript">
</script>