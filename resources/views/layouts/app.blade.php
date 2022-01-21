<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inserción Laboral</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- header section starts  -->

<header class="header">

<a href="home.html" class="logo"><i class="fas fa-building"></i> OILP </a>

<nav class="navbar">
   <div id="close-navbar" class="fas fa-times"></div>
   <a href="home.html">Inicio</a>
   <a href="#">Acerca</a>
   <a href="#">contacto</a>
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
   <span class="btn active login-btn">login</span>
   <span class="btn register-btn">registrar</span>
</div>

<form class="login-form active" method="POST" action="">
   <h3>Iniciar sesión</h3>
   <input type="email" placeholder="ingresa tu email" class="box">
   <input type="password" placeholder="ingresa tu contraseña" class="box">
   <div class="flex">
      <input type="checkbox" name="" id="remember-me">
      <label for="remember-me">recuerdame </label>
      <a href="#">olvidaste la contraseña?</a>
   </div>
   <input type="submit" value="iniciar sesión" class="btn">
</form>

<form class="register-form" onsubmit="return false;">
   <h3>registrar</h3>
   <a href="estudiantes.html" class="btn">Estudiantes y egresados</a>
   <a href="egresados.html" class="btn">empresa</a>
</form>

</div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
