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

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- Favicon link -->
   <link rel="icon" href="{{ url('favicon.ico') }}" >

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/forms.css') }}">

</head>
<body>

<!-- header section starts  -->
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
      <a href="{{ route('home') }}">Inicio</a>
      @auth
         @if ($userRole >= 2)
         <a href="{{ route('student.index') }}">Postulantes</a>
         @endif
      @endauth
      <a href="{{ route('business.index') }}">Empresas</a>
      <a href="{{ route('offer.index') }}">Vacantes</a>
      <a href="{{ route('stats') }}">Estadisticas</a>
      <a href="{{ route('contacts') }}"><div class="fas fa-phone"></div></a>
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
    <div class="title">Registro de vacantes</div>
    <div class="content">
      <form action="{{ route('offer.store') }}" method="POST">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre del Puesto</span>
            <input type="text" placeholder="Ingresa el nombre del puesto" name="name" required>
          </div>
          <div class="input-box">
            <span class="details">Funciones o perfil del puesto</span>
            <textarea rows="3" cols="40" placeholder="Ingresa la descripción del puesto" name="description"></textarea>
          </div>
          <div class="input-box">
            <span class="details">Sueldo</span>
            <input type="number" value="0" min="0" oninput="validity.valid||(value='');" placeholder="Ingresa el sueldo" name="salary" required>
          </div>
          <div class="input-box">
            <span class="details">Ubicación</span>
            <input type="text" placeholder="Ingresa tu dirección" required name="location">
          </div>
          <div class="input-box">
            <span class="details">Tipo de contracto</span>
            <select class="form-control" name="contractType">
                <option selected>----Selecciona----</option>
                <option value="0">Temporal</option>
                <option value="1">Fijo</option>
              </select>
          </div>
          <div class="input-box">
            <span class="details">Horario</span>
            <input type="text" placeholder="Ingresa el horario" name="schedule">
          </div>
          <div class="input-box">
            <span class="details">Correo</span>
            <input type="email" placeholder="Ingresa el email al que se debe enviar el curriculum" name="contactMail">
          </div>
          <div class="input-box">
            <span class="details">Persona de contacto</span>
            <input type="text" placeholder="Ingresa el nombre de la persona" required name="contactName">
          </div>
          <div class="input-box">
            <span class="details">Teléfono</span>
            <input type="tel" placeholder="Ingresa el teléfono" required name="contactNumber">
          </div>
          <input type="hidden" name="status" value="0">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        </div>

        <div class="button">
          <input type="submit" id="register" value="Crear">
        </div>
      </form>
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