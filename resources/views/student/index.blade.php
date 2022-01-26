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
@auth
   <?php
        $authUser = $users->find(Auth::user());
        $userRole = $authUser->role;
   ?>
@endauth

<header class="header">

   <a href="{{ route('home') }}" class="logo"><i class="fas fa-building"></i> OILP-IPISA </a>

   <nav class="navbar">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="@auth {{ route('home') }} @endauth">Inicio</a>
      <a href="@auth {{ route('student.index') }} @endauth">Postulantes</a>
      <a href="@auth {{ route('business.index') }} @endauth">Empresas</a>
      <a href="@auth {{ route('offer.index') }} @endauth">Vacantes</a>
      <a href="@auth {{ route('stats') }} @endauth">Estadisticas</a>
      <a href="@auth {{ route('contacts') }} @endauth"><div class="fas fa-phone"></div></a>
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
         <input type="password" placeholder="" class="box" name="password" value="..." disabled>
         
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
      @auth
         @if ($userRole == 3)
            <a href="{{ route('admin') }}" class="btn">Administrador</a>
         @endif
      @endauth
   </form>

</div>
 
 <!-- account form section ends -->
 
 <!-- header section ends -->

    <div class="container">
        <div class="row my-5">
          <div class="col-lg-12">
            <div class="card shadow">
              <div class="card-header bg-blue d-flex justify-content-between align-items-center">
                <h3 class="text-light"><?php if($userRole == 3){ echo "Manejar";}  ?> Estudiantes y Egresados</h3>
                <a href="@if ($userRole == 2) {{ route('offer.create') }} @endif" class="btn btn-light" style="visibility: hidden;"><i class="bi-plus-circle me-2"></i>Añadir Nueva Vacante</a>   
              </div>
              <div class="card-body" id="show_all_employees">
                <div style="overflow-x: auto;">
                    <table class="table table-striped table-sm text-center align-middle" id="data-table" >
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cédula</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Género</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Provincia</th>
                            <th>Nacionalidad</th>
                            <th>Teléfono Residencial</th>
                            <th>Teléfono Célular</th>
                            <th>¿Tiene licencia de conducir?</th>
                            <th>¿Tiene vehículo propio?</th>
                            <th>Año de graduación</th>
                            <th>Centro Académico</th>
                            <th>Grado</th>
                            <th>Matrícula</th>
                            <th>Carrera Técnica</th>
                            <th>Años de Experiencia</th>
                            <th>Área Laboral de Interés</th>
                            <th>CV</th>
                            <!-- <th>¿Asignado?</th> -->
                            @if($userRole == 3)
                                <th>Acciones</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->surname }}</td>
                                    <td>{{ $student->identification }}</td>
                                    <td>{{ $student->birthday }}</td>
                                    <td>{{ $student->sex }}</td>
                                    <td>{{ $student->direction }}</td>
                                    <td>{{ $student->municipality }}</td>
                                    <td>{{ $student->province }}</td>
                                    <td>{{ $student->nationality }}</td>
                                    <td>{{ $student->homeNumber }}</td>
                                    <td>{{ $student->cellphone }}</td>
                                    <td>
                                        <?php if($student->hasDrivingLicense){
                                            echo "Sí";
                                        }else{
                                            echo "No";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if($student->hasVehicle){
                                            echo "Sí";
                                        }else{
                                            echo "No";
                                        } ?>
                                    </td>
                                    <td>{{ $student->graduationYear }}</td>
                                    <td>{{ $student->school }}</td>
                                    <td>{{ $student->grade }}</td>
                                    <td>{{ $student->enrollmentID }}</td>
                                    <td>{{ $student->career }}</td>
                                    <td>{{ $student->experience }}</td>
                                    <td>{{ $student->workArea }}</td>
                                    <td>
                                        <form action="{{ route('download', $student->cv_path) }}" method="get">
                                            <input type="hidden" name="cv_path" value="{{ $student->cv_path }}">
                                            <button type="submit" id="deleteIcon" class="text-danger mx-1 deleteIcon">Descargar</button>
                                        </form>
                                    </td>
                                <!--    <td>{{ $student->offer_id }}</td> -->
                                    @if($userRole == 3)
                                        <td>
                                            
                                            <form action="{{ route('offer.destroy', $student->id) }}" method="post">
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