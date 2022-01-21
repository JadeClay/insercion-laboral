<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inserción Laboral</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
   
<!-- header section starts  -->

<header class="header">

   <a href="{{ route('home') }}" class="logo"><i class="fas fa-building"></i> OILP </a>

   <nav class="navbar">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="{{ route('home') }}">Inicio</a>
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
         <a href="#">Olvidaste la contraseña?</a>
      </div>
      <input type="submit" value="iniciar sesión" class="btn" @auth
          disabled
      @endauth>
   </form>
   @endguest
   @auth
      <form class="login-form active" method="POST" action="{{ route('logout') }}">
         <h3>Salir de la sesión</h3>
         @csrf
         <input type="email" placeholder="Desactivado" class="box" name="email" disabled>
         <input type="password" placeholder="Desactivado" class="box" name="password" disabled>
         <div class="flex">
            <input type="checkbox" name="remember" id="remember-me" disabled>
            <label for="remember-me">Recuérdame </label>
            <a href="#" disabled>Olvidaste la contraseña?</a>
         </div>

         <input type="submit" value="Salir de la sesión" class="btn">
      </form>
   @endauth



   <form class="register-form" onsubmit="return false;">
      <h3>Registráte</h3>
      <a href="{{ route('student.create') }}" class="btn">Estudiantes y Egresados</a>
      <a href="{{ route('student.create') }}" class="btn">Empresa</a>
   </form>

</div>

<!-- account form section ends -->

<!-- header section ends -->

<!-- home section starts  -->

<section class="home">

   <div class="swiper home-slider">
      
      <div class="swiper-wrapper">

         <section class="swiper-slide slide" style="background: url(images/IMG_0550.jpg) no-repeat;">
            <div class="content">
               <h3>la pasantía, tu entrada al mundo laboral!</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit labore dolore unde, quidem corrupti?</p>
               <button class="swiper-btn btn">iniciar sesión</button>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(images/IMG_0377.jpg) no-repeat;">
            <div class="content">
               <h3>oficinas de intermediación laboral y pasantías </h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit labore dolore unde, quidem corrupti?</p>
               <button class="swiper-btn btn">iniciar sesión</button>
            </div>
         </section>

         <section class="swiper-slide slide" style="background: url(images/IMG_0828.jpg) no-repeat;">
            <div class="content">
               <h3>Conectate con empresas por todo el país</h3>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas impedit labore dolore unde, quidem corrupti?</p>
               <button class="swiper-btn btn">iniciar sesión</button>
            </div>
         </section>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- home section ends -->

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>