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
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('css/vacante.css') }}">


</head>
<body>
    <!-- header section starts  -->

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
      <input type="text" placeholder="" class="box" name="password" value="
      @if (Auth::user()->role = 1)
         Egresado
      @elseif(Auth::user()->role = 2)
         Empresa
      @else
         Administrador
      @endif" disabled>
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
                <h3 class="text-light">Manejar Vacantes</h3>
                <a href="añadir_vacante.html" class="btn btn-light"><i class="bi-plus-circle me-2"></i>Añadir Nueva Vacante</a>   
              </div>
              <div class="card-body" id="show_all_employees">
                <h1 class="text-center text-secondary my-5">No hay registros en la base de datos</h1>
    
                <div style="overflow-x: auto;">
                <table class="table table-striped table-sm text-center align-middle" id="data-table">
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
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>fff</td>
                        <td>fff</td>
                        <td>fff</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <a href="editar_vacante.html" id="" class="text-success mx-1 editIcon"><i class="bi-pencil-square h4"></i></a>
        
                          <button id="deleteIcon" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></button>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
            
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- custom js file link  -->
    <script src="js/script.js"></script>

    
<!-- sweetalert js link  -->
<script src="js/sweetalert2.all.min.js"></script>

<script>



document.querySelector('#deleteIcon').onclick = () =>{
  Swal.fire({
  title: '¿Estás seguro?',
  text: "¡No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, eliminalo!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      '¡Eliminado!',
      'El registro ha sido eliminado.',
      'success'
    )
  }
})
}
</script>

   
  
</body>
</html>