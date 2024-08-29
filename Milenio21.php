<?php
// Conexión a la base de datos
$servername = "SSO Signon";
$username = "jbhe45033595085";
$password = "";
$dbname = "viviendas";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta SQL
$sql = "SELECT datos_viviendas.id, datos_viviendas.nombre, datos_viviendas.descripcion, datos_viviendas.tipo, datos_viviendas.num_habitaciones, datos_viviendas.num_banos, datos_viviendas.ciudad, datos_viviendas.latitud, datos_viviendas.longitud, datos_viviendas.precio, fotos.imagen
        FROM datos_viviendas
        INNER JOIN fotos
        ON datos_viviendas.id = fotos.vivienda_id
        GROUP BY datos_viviendas.id
        ORDER BY datos_viviendas.id DESC";

$resultado = mysqli_query($conn, $sql);

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="icon" href="iconos/milenio21logos/logom21 1.png" />
  <title>Milenio 21 Realty</title>
</head>

<body>
  <div class="ocultar"></div>
  <header>
    <div class="container">
      <a class="logo" href="Milenio21.php"><img class="logo-img" src="iconos\milenio21logos/logom21 3.png"
          alt="" /></a>
      <div class="menu">
        <ul class="menu-items hidden">
          <li><a href="Milenio21.php"> Inicio</a></li>
          <li><a href="#propiedades"> Propiedades</a>
          </li>
          <li><a href="#contacto"> Contacto</a></li>
          <li><a href="about.php"> Nosotros</a></li>
        </ul>
      </div>
      <!--Redes sociales-->
      <div class="redes-sociales">
        <ul>
          <li>
            <a href="https://www.facebook.com/Rgb2023?mibextid=LQQJ4d"><img src="iconos/facebook.png" alt="Facebook" />
            </a>
          </li>
          <li>
            <a href="https://www.tiktok.com/@user4002954376151?_t=8bHrIQuzHAZ&_r=1"><img src="iconos/tik-tok.png"
                alt="tik-tok" /></a>
          </li>
          <li>
            <a href="https://instagram.com/rgbcancun?igshid=YmMyMTA2M2Y="><img src="iconos/instagram.png"
                alt="Instagram" /> </a>
          </li>
          <li>
            <a href="https://youtube.com/@RGBRGB234"><img src="iconos/youtube.png" alt="Youtube" width="36px" /> </a>
          </li>
        </ul>
      </div>
    </div>
  </header>


  <!--Contenido-->
  <div class="language-selector">
    <div class="selected-language">
      <a href="EN/Milenio21.php"><img src="iconos/estados-unidos.png" alt="US Flag" /></a>
      <a href="FR/Milenio21.php"><img src="iconos/francia (1).png" alt="US Flag" /></a>
      <a href="CH/Milenio21.php"><img src="iconos/porcelana (1).png" alt="US Flag" /></a>
    </div>
  </div>
  <div class="whatsapp">
    <div class="selected-whattsapp">
      <a href="https://wa.me/529984596417"><img src="iconos/whatsapp-64.png" alt="whatsapp" width="50px" /></a>
    </div>
  </div>
  <div class="video-background">
    <video class="fondo" autoplay muted loop id="myVideo">
      <source src="imagenes/iStock-1322217829.mp4" type="video/mp4" />
    </video>
    <div class="search-container">
      
    <select id="location" onchange="redirectToLink()">
        <option value="" disabled selected hidden>Lugar</option>
        <option value="Cancún">Cancún</option>
        <option value="Playa Del Carmen">Playa Del Carmen</option>
        <option value="Tulum">Tulum</option>
        <option value="Akumal">Akumal</option>
        <option value="Puerto Morelos">Puerto Morelos</option>
        <option value="Cozumel">Cozumel</option>
        <option value="Merida">Merida</option>
        <option value="Isla Mujeres">Isla Mujeres</option>
        <option value="Holbox">Holbox</option>
        <option value="Puerto Progreso">Puerto Progreso</option>
        <option value="Nayarit">Nayarit</option>
        <option value="Puerto Vallarta">Puerto Vallarta</option>
        <option value="Cabo San Lucas">Cabo San Lucas</option>
      </select>
      <select id="status" onchange="redirectToLink()">
        <option value="" disabled selected hidden>Tipo de propiedad</option>
        <option value="Casa">Casa</option>
        <option value="Condominio">Condominio</option>
        <option value="Departamento">Departamento</option>
        <option value="Estudio">Estudio</option>
        <option value="Duplex">Duplex</option>
        <option value="Penthouse">Penthouse</option>
        <option value="Terreno">Terrenos</option>
        <option value="Edificio">Edificios</option>
      </select>
      <select id="bedrooms" onchange="redirectToLink()">
        <option value="" disabled selected hidden>N. Recamaras</option>
        <option value="1">1 - 2</option>
        <option value="2">2 - 3</option>
        <option value="3">3 - 4</option>
        <option value="4">4 - 5</option>
        <option value="5">+5 </option>
      </select>
      <select id="bathrooms" onchange="redirectToLink()">
        <option value="" disabled selected hidden>N. Baños</option>
        <option value="1">1 - 2</option>
        <option value="2">2 - 3</option>
        <option value="3">3 - 4</option>
        <option value="4">4 - 5</option>
        <option value="5">+5 </option>
      </select>
      <select id="price" onchange="redirectToLink()">
        <option value="" disabled selected hidden>Precio</option>
        <option value="1Millon">1.000.000-1.999.999</option>
        <option value="2Millones">2.000.000-2.999.999</option>
        <option value="3Millones">3.000.000-3.999.999</option>
        <option value="4Millones">4.000.000-4.999.999</option>
        <option value="5Millones">5.000.000-9.999.999</option>
        <option value="10Millones">10.000.000-19.999.999</option>
        <option value="20Millones">20.000.000-50.000.000</option>
      </select>
      
    </div>
    <div class="video-overlay">
      <p>
        Cancún, Playa Del Carmen, Akumal, Tulum, Puerto Morelos
      </p>
    </div>
  </div>
  <a name="propiedades"></a>
  <h1 class="tituloPropiedades">Propiedades</h1>
  <section class="properties">
  <?php
      // Muestra de la información
      while ($fila = mysqli_fetch_assoc($resultado)) {
        $valor="";
        if($fila['precio']>100000&&$fila['precio']<2000000){
          $valor="1Millon";
        }
        else if($fila['precio']>2000000&&$fila['precio']<3000000){
          $valor="2Millones";
        }
        if($fila['precio']>3000000&&$fila['precio']<4000000){
          $valor="3Millones";
        }
        else if($fila['precio']>4000000&&$fila['precio']<5000000){
          $valor="4Millones";
        }
        else if($fila['precio']>5000000&&$fila['precio']<10000000){
          $valor="5Millones";
        }
        else if($fila['precio']>10000000&&$fila['precio']<20000000){
          $valor="10Millones";
        }
        else if($fila['precio']>20000000&&$fila['precio']<50000000){
          $valor="20Millones";
        }
        ?>
        <div class="property propertys">
          <a name="<?php echo $fila['ciudad']; ?>"></a>
          <a name="<?php echo $valor; ?>"></a>
          <a name="<?php echo $fila['tipo']; ?>"></a>
          <a name="<?php echo $fila['num_habitaciones']; ?>"></a>
          <a name="<?php echo $fila['num_banos']; ?>"></a>
          <a href="propiedades/propiedad/<?php echo $fila['id']; ?>.php">
            <img class="foto" src="administrador/base_datos/<?php echo $fila['imagen']; ?>" alt="Imagen de propiedad" />
            <div class="property-details">
              <h3>
                <?php echo $fila['nombre']; ?>
              </h3>
              <p>
                <?php
                $descripcion = $fila['descripcion'];
                $max_length = 95;

                if (strlen($descripcion) > $max_length) {
                  $descripcion = substr($descripcion, 0, $max_length);
                  $last_newline_pos = strrpos($descripcion, "\n");
                  if ($last_newline_pos !== false) {
                    $descripcion = substr($descripcion, 0, $last_newline_pos);
                  }
                  $descripcion .= '...';
                }

                echo $descripcion; ?>
              </p>
              <div class="property-info">
                <p><img src="iconos/dormitorio.png" alt="" />
                  <?php echo $fila['num_habitaciones']; ?> habitaciones
                </p>
                <p><img src="iconos/inodoro.png" alt="" />
                  <?php echo $fila['num_banos']; ?> baños
                </p>
                <p>
                  <img src="iconos/marcador-de-posicion.png" alt="" />
                  <?php echo $fila['ciudad']; ?>
                </p>
                <p>Estado: Venta</p>
                <p>
                  <img src="iconos/signo-de-dolar.png" alt="" /> Precio: $
                  <?php echo number_format($fila['precio'], 0, ',', '.'); ?> MXN
                </p>
              </div>
            </div>
          </a>
        </div>
        <?php
      } ?>
  </section>
  <div id="viviendas-container"></div>
  <div class="MexicoLindo">
  	<h1 class="Videos">Videos</h1>
    <h1 class="Conoce">Mexico</h1>
    <h1 class="Mexico">Lindo</h1>
  </div>
  <section class="properties">
    <div id="video-modal1" class="modal">
      <div class="modal-content">
        <span class="close close1">&times;</span>
        <video width="560" height="315" controls>
        <source src="imagenes/videosenespaol/1 lindo playa español.mp4" type="video/mp4">
    </video>
      </div>
    </div>
    <div id="video-modal2" class="modal">
      <div class="modal-content">
        <span class="close close2">&times;</span>
        <video width="560" height="315" controls>
        <source src="imagenes/videosenespaol/2 lindo chapultepec español.mp4" type="video/mp4">
    </video>
      </div>
    </div>
    <div id="video-modal3" class="modal">
      <div class="modal-content">
        <span class="close close3">&times;</span>
        <video width="560" height="315" controls>
          <source src="imagenes/videosenespaol/4 lindo Cancun infraestructura.mp4" type="video/mp4">
      </video>
      </div>
    </div>
    <div id="video-modal4" class="modal">
      <div class="modal-content">
        <span class="close close4">&times;</span>
        <video width="560" height="315" controls>
          <source src="imagenes/videosenespaol/5 lindo akumal español.mp4" type="video/mp4">
      </video>
      </div>
    </div>
    <div id="video-modal5" class="modal">
      <div class="modal-content">
        <span class="close close5">&times;</span>
        <video width="560" height="315" controls>
          <source src="imagenes/videosenespaol/Mexico lindo veracruz Español.mp4" type="video/mp4">
      </video>
      </div>
    </div>
    <div id="video-modal6" class="modal">
      <div class="modal-content">
        <span class="close close6">&times;</span>
        <video width="560" height="315" controls>
          <source src="imagenes/videosenespaol/riviera maya español.m4v" type="video/mp4">
      </video>
      </div>
    </div>
    <div id="video-modal7" class="modal">
      <div class="modal-content">
        <span class="close close7">&times;</span>
        <video width="560" height="315" controls>
          <source src="imagenes/videosenespaol/3 lindo angel español.mp4" type="video/mp4">
      </video>
      </div>
    </div>
    <div class="property property1">
      <a name="PlayaCarmen"></a>
      <img class="foto" src="imagenes/Playa_del_Carmen_in_Mexico_(29725304248).jpg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color:red;">Playa del Carmen</h3>
      </div>
    </div>
    <div class="property property2">
      <a name="Chapultepec"></a>
      <img class="foto" src="imagenes/Lago-Chapultepec.jpg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color: darkgreen;">Chapultepec</h3>
      </div>
    </div>
    <div class="property property3">
      <a name="Cancun"></a>
      <img class="foto" src="imagenes/cancun.jpg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color: darkmagenta;">Cancún</h3>
      </div>
    </div>
    <div class="property property4">
      <a name="Akumal"></a>
      <img class="foto" src="imagenes/akumal-turtles.jpg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color: deepskyblue;">Akumal</h3>
      </div>
    </div>
    <div class="property property5">
      <a name="Veracruz"></a>
      <img class="foto" src="imagenes/veracruz.jpg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color: chocolate;">Veracruz</h3>
      </div>
    </div>
    <div class="property property6">
      <a name="Maya"></a>
      <img class="foto" src="imagenes/zona-arqueologica-detulum.jpg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color: darkolivegreen;">Riviera Maya</h3>
      </div>
    </div>
    <div class="property property7">
      <a name="Mexico"></a>
      <img class="foto" src="imagenes/bandera-Mexico-1200x675-1.jpeg" alt="Imagen de propiedad" />
      <div class="property-details">
        <h3 style="color: green;">México Lindo</h3>
      </div>
    </div>
  </section>
  <a name="contacto"></a>
  <section class="ZonaDeContacto">
    <form action="https://formsubmit.co/rgbvegas@gmail.com" method="POST">
      <h2>Contacto</h2>
      <label for="name">Nombre:</label>
      <input type="text" id="name" name="name" required>

      <label for="phone">Telefono:</label>
      <input type="number" id="phone" name="phone" required>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Mensaje:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <input type="submit" value="Enviar">

      <input type="hidden" name="_next" value="https://mexrealtor.mx/Milenio21">
      <input type="hidden" name="_captcha" value="false">
    </form>
  </section>
  <a name="Certificados"></a>
  <section id="logos">
    <div class="container">
      <div class="logo-list">
        <img class="logo1" src="iconos/logosasociados/MATRICULA.jpg" alt="Logo 1">
        <img src="iconos/logosasociados/CertificadoI.png" alt="Logo 1">
        <img src="iconos/logosasociados/5.png" alt="Logo 2" width="300px">
        <img src="iconos/logosasociados/3.png" alt="Logo 3">
        <img src="iconos/logosasociados/AMPI.png" alt="Logo 4">
        <img src="iconos/logosasociados/CREA.jpg" alt="Logo 5">
        <!-- Agrega más logotipos aquí -->
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-content">
      <div class="contacto">
        <h3>Contacto</h3>
        <p><i class="fas fa-envelope"></i> mexicanrealtyhomes@gmail.com <br> rgbvegas@gmail.com</p>
        <p><img src="iconos/mexico.png" alt=""> +52 99 84 59 64 17 </p>
        <p><img src="iconos/estados-unidos (1).png" alt=""> +1 702 219 69 11</p>
        <p>
          <i class="fas fa-map-marker-alt"></i> Cancun Quintana Roo Mexico 77536
        </p>
      </div>
    </div>
    <div class="copyrigth">
      <p>&copy; 2023 Milenio 21 Realty. Todos los derechos reservados.</p>
    </div>
  </footer>
  <script src="script.js"></script>
</script>

</body>

</html>