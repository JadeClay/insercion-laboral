@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacantes</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />


    <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('css/offer.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    <!-- header section starts  -->
    <?php
        $authUser = $users->find(Auth::user());
        $userRole = $authUser->role;
    ?>
    <header class="header">

        <a href="{{ route('home') }}" class="logo"><i class="fas fa-building"></i> OILP-IPISA </a>

        <nav class="navbar">
        <div id="close-navbar" class="fas fa-times"></div>
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('offer.index') }}">Vacantes</a>
        <a href="{{ route('stats') }}">Estadisticas</a>
        <a href="{{ route('contacts') }}">Contacto</a>
        </nav>

        <div class="icons">
        <div id="account-btn" class="fas fa-user"></div>
        <div id="menu-btn" class="fas fa-bars"></div>
        </div>

    </header>

        <!-- account form section starts  -->

    <div class="account-form">

        <div id="close-form" class="fas fa-times"></div>

        <div class="buttons">
        <span class="btn active login-btn">Login</span>
        <span class="btn register-btn">Registráte</span>
        </div>
        @guest
        <form class="login-form active" method="POST" action="{{ route('login') }}">
        <h3>Iniciar sesión</h3>
        @csrf
        <input type="email" placeholder="@error('email') {{ $message }} ............... @enderror Ingresa tu email" class="box" name="email">
        <input type="password" placeholder="@error('password') {{ $message }} ............ @enderror Ingresa tu password" class="box" name="password">
        <div class="flex">
            <input type="checkbox" name="remember" id="remember-me">
            <label for="remember-me">Recuérdame </label>
        </div>
        <input type="submit" value="iniciar sesión" class="btn">
        </form>
        @endguest
        @auth
        <form class="login-form active" method="POST" action="{{ route('logout') }}">
            <h3>Está logueado</h3>
            @csrf
            <input type="email" placeholder="{{ Auth::user()->email }}" class="box" name="email" disabled>
            <input type="password" placeholder="" class="box" name="password" value="Texto de Relleno" disabled>
            
            <div class="flex">
                <input type="checkbox" name="remember" id="remember-me" disabled>
                <label for="remember-me">Recuérdame </label>
            </div>

            <input type="submit" value="Salir de la sesión" class="btn">
        </form>
        @endauth



        <form class="register-form" onsubmit="return false;">
        <h3>Registráte</h3>
        <a href="{{ route('student.create') }}" class="btn">Estudiantes y Egresados</a>
        <a href="{{ route('business.create') }}" class="btn">Empresa</a>
        </form>

    </div>
 
 <!-- account form section ends -->
 
 <!-- header section ends -->

    <div class="container">
        <div class="row my-5">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header bg-blue d-flex justify-content-between align-items-center">
                <h3 class="text-light"><?php if($userRole == 3){ echo "Manejar";}  ?> Vacantes</h3>
                <a href="@if ($userRole == 2) {{ route('offer.create') }} @endif" class="btn btn-light" ><i class="bi-plus-circle me-2"></i>Añadir Nueva Vacante</a>   
              </div>
              <div class="card-body" id="show_all_employees">
                <div style="overflow-x: auto;">
                    <table class="table table-striped table-sm text-center align-middle" id="data-table" >
                        <thead>
                        <tr>
                            <th>Nombre de la Empresa</th>
                            <th>Nombre del Puesto</th>
                            <th>Perfil del puesto</th>
                            <th>Sueldo</th>
                            <th>Ubicación</th>
                            <th>Tipo de contrato</th>
                            <th>Horario</th>
                            <th>E-mail Curriculum</th>
                            <th>Persona de Contacto</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            @if($userRole == 3)
                                <th>Acciones</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td><?php 
                                        $business = $businesses->find($offer->business_id); 

                                        if(!empty($business->id)){
                                            echo $business->name;
                                        }
                                        
                                    ?></td>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->description }}</td>
                                    <td>{{ $offer->salary }}</td>
                                    <td>{{ $offer->location }}</td>
                                    <td><?php 
                                        if($offer->contractType == 0){
                                            echo "Temporal";
                                        } else{
                                            echo "Indefinido";
                                        }
                                    ?></td>
                                    <td>{{ $offer->schedule }}</td>
                                    <td>{{ $offer->contactMail }}</td>
                                    <td>{{ $offer->contactName }}</td>
                                    <td>{{ $offer->contactNumber }}</td>
                                    <td><?php if($offer->status == 0){
                                        echo "<p style='color: yellow;'><i class='fas fa-exclamation-triangle'></i><b>Pendiente</b></p>";
                                    }else{
                                        echo "<p style='color: red;'><i class='fas fa-window-close'></i><b>ASIGNADA</b></p>";
                                    } ?></td>

                                    @if($userRole == 3)
                                        <td>
                                            <a href="editar_vacante.html" id="" class="text-success mx-1 editIcon"><i class="bi-pencil-square h4"></i></a>
                                            
                                            <form action="{{ route('offer.destroy', $offer->id) }}" method="post">
                                                <button type="submit" id="deleteIcon" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></button>
                                            </form>
                                        
                                        </td>
                                    @endif                                        
                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            </div>
          </div>
        </div>
      </div>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="{{ asset('js/script.js') }}"></script>

<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>


@if (session()->has('success'))
    <script>
        window.onload = Swal.fire({
            title: 'Éxito!',
            text: '{{ $offers }}',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
@endif

</body>
</html>