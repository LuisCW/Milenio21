<?php
session_start();
$error = '';
if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = "Por favor, introduzca su nombre de usuario y contraseña";
    }
    else{
        $administrador = $_POST['username'];
        $password = $_POST['password'];
        $connection = mysqli_connect("SSO Signon","jbhe45033595085","","viviendas");
        $query = "SELECT * FROM administradores WHERE administrador='$administrador' AND password='$password'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1){
            $_SESSION['login_user'] = $username;
            header("location: admin_shares.php");
        }
        else{
            $error = "El nombre de usuario o la contraseña son incorrectos";
        }
        mysqli_close($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link rel="icon" href="../iconos/milenio21logos/logom21 1.png" />
    <title>Administrador</title>
  </head>
  <body>
  <header>
      <div class="container">
        <a class="logo" href="Milenio21.php"
          ><img
            class="logo-img"
            src="../iconos\milenio21logos/logom21 3.png"
            alt=""
        /></a>
        
        <div class="menu">
          <ul class="menu-items hidden">
            <li><a href="../Milenio21.php"> Inicio</a></li>
            <li><a href="../Milenio21.php#propiedades"> Propiedades</a></li>
            <li><a href="../Milenio21.php#contacto"> Contacto</a></li>
            <li><a href="../about.php"> Nosotros</a></li>
          </ul>
        </div>
      </div>
      
    </header>

    <div class="login-form">
        <h2>Bienvenido Administrador</h2>
        <form method="post" action="">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" placeholder="Introduzca su nombre de usuario">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Introduzca su contraseña">

            <button type="submit" name="submit">Iniciar Sesión</button>
            <span><?php echo $error; ?></span>
        </form>
    </div>

    <footer>
      <div class="footer-content">
        <div class="contacto">
          <h3>Contacto</h3>
          <p>
            <i class="fas fa-envelope"></i> mexicanrealtyhomes@gmail.com <br />
            rgbvegas@gmail.com
          </p>
          <p><img src="../iconos/mexico.png" alt=""> +52 99 84 59 64 17 </p>
          <p><img src="../iconos/estados-unidos (1).png" alt=""> +1 702 219 69 11</p>
          <p>
            <i class="fas fa-map-marker-alt"></i> Cancun Quintana Roo Mexico
            77536
          </p>
        </div>
      </div>
      <div class="copyrigth">
        <p>&copy; 2023 Milenio 21 Realty. Todos los derechos reservados.</p>
      </div>
    </footer>
  </body>
</html>