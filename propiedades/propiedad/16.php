<!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="vivienda.css" />
      <link rel="icon" href="../../iconos/milenio21logos/logom21 1.png" />
      <title>Milenio 21 Realty</title>
    </head>
    
    <body>
      <div class="ocultar"></div>
      <header>
        <div class="container">
          <a class="logo" href="../../Milenio21.php"><img class="logo-img" src="../../iconos\milenio21logos/logom21 3.png"
              alt="" /></a>
          <div class="menu">
            <ul class="menu-items hidden">
              <li><a href="../../Milenio21.php"> Inicio</a></li>
              <li><a href="../../Milenio21.php#propiedades"> Propiedades</a></li>
              <li><a href="../../Milenio21.php#contacto"> Contacto</a></li>
              <li><a href="../../about.php"> Nosotros</a></li>
            </ul>
          </div>
        </div>
      </header>
      <div class="language-selector">
        <div class="selected-language">
          <a href="#"><img src="../../iconos/estados-unidos.png" alt="US Flag" /></a>
          <a href="#"><img src="../../iconos/francia (1).png" alt="US Flag" /></a>
          <a href="#"><img src="../../iconos/porcelana (1).png" alt="US Flag" /></a>
        </div>
      </div>
      <div class="whatsapp">
        <div class="selected-whattsapp">
          <a href="https://wa.me/529984596417"><img src="../../iconos/whatsapp-64.png" alt="whatsapp" width="50px" /></a>
        </div>
      </div>
      <?php
    
      // Establecer la conexión con la base de datos
      $servername = "SSO Signon";
      $username = "jbhe45033595085";
      $password = "";
      $dbname = "viviendas";
    
      $conn = mysqli_connect($servername, $username, $password, $dbname);
    
      // Verificar si la conexión se realizó correctamente
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    
      // Obtener el ID seleccionado
      $idSeleccionado = 16;
    
      // Consulta SQL para obtener los datos de la vivienda seleccionada
      $sql = "SELECT id, nombre, descripcion, tipo, num_habitaciones, num_banos, ciudad, latitud, longitud, precio FROM datos_viviendas WHERE id = $idSeleccionado";
      $result = mysqli_query($conn, $sql);
    
      // Comprobar si hay datos y mostrarlos
      if (mysqli_num_rows($result) > 0) {
        // Salida de datos de la vivienda seleccionada
        $row = mysqli_fetch_assoc($result);
    
        $id = $row["id"];
        $nombre = $row["nombre"];
        $descripcion = $row["descripcion"];
        $tipo = $row["tipo"];
        $num_habitaciones = $row["num_habitaciones"];
        $num_banos = $row["num_banos"];
        $ciudad = $row["ciudad"];
        $latitud = $row["latitud"];
        $longitud = $row["longitud"];
        $precio = $row["precio"];
    
        // Consulta SQL para obtener las fotos de la vivienda seleccionada
        $sql_fotos = "SELECT imagen FROM fotos WHERE vivienda_id = $id";
        $result_fotos = mysqli_query($conn, $sql_fotos);
    
        // Array para almacenar las rutas de las fotos
        $fotos = array();
    
        // Comprobar si hay datos y almacenar las rutas de las fotos
        if (mysqli_num_rows($result_fotos) > 0) {
          while ($row_fotos = mysqli_fetch_assoc($result_fotos)) {
            $fotos[] = $row_fotos["imagen"];
          }
        }
    
        // Código HTML para mostrar los datos y las fotos
        ?>
        <h2 class="titulo">
          <?php echo $nombre; ?>
        </h2>
        <div class="gallery-info">
          <p>
            <?php echo $descripcion; ?>
          </p>
          <ul>
            <li>
              <img src="../../iconos/dormitorio.png" alt="" />
              Recamaras:
              <?php echo $num_habitaciones; ?>
              <img src="../../iconos/inodoro.png" alt="" />
              Baños:
              <?php echo $num_banos; ?>
            </li>
            <li>
              <img src="../../iconos/marcador-de-posicion.png" alt="" />
              <?php echo $ciudad; ?> México
            </li>
            <li>
              <img src="../../iconos/signo-de-dolar.png" alt="" />
              Precio: $
              <?php echo number_format($precio, 0, ",", "."); ?> MXN
            </li>
          </ul>
        </div>
        <div class="slider">
          <div class="slider__wrapper">
            <?php foreach ($fotos as $foto): ?>
              <div class="slider__slide">
                <img src="../../administrador/base_datos/<?php echo $foto; ?>" alt="Imagen de <?php echo $nombre; ?>" class="gallery-image">
              </div>
            <?php endforeach; ?>
          </div>
          <div class="slider__controls">
            <a class="slider__control slider__control--prev">&lsaquo;</a>
            <a class="slider__control slider__control--next">&rsaquo;</a>
          </div>
          <div class="slider__indicators"></div>
        </div>
        <div id="map_<?php echo $id; ?>" class="map1"></div>
        <?php
      } else {
        echo "No se encontraron resultados para el ID seleccionado";
      }
    
      // Cerrar la conexión con la base de datos
      mysqli_close($conn);
    
      ?>
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
    
          <input type="hidden" name="_next" value="https://mexrealtor.mx/propiedades/propiedad/Propiedad1.html">
          <input type="hidden" name="_captcha" value="false">
        </form>
      </section>
    
      <footer>
        <div class="footer-content">
          <div class="contacto">
            <h3>Contacto</h3>
            <p>
              <i class="fas fa-envelope"></i> mexicanrealtyhomes@gmail.com <br />
              rgbvegas@gmail.com
            </p>
            <p><img src="../../iconos/mexico.png" alt="" /> +52 99 84 59 64 17</p>
            <p>
              <img src="../../iconos/estados-unidos (1).png" alt="" /> +1 702 219
              69 11
            </p>
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
      <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMTvHc9OcxTmJHJ5_h3d85ugdArZQdRTw&callback=initMap"></script>
    
      <script src="vivienda.js"></script>
      <script>
        // Código JavaScript para inicializar el mapa con la ubicación de la vivienda
        function initMap() {
          var map_<?php echo $id; ?> = new google.maps.Map(document.getElementById("map_<?php echo $id; ?>"), {
            center: {
              lat: <?php echo $latitud; ?>,
              lng: <?php echo $longitud; ?>
            },
            zoom: 13
          });
        }
      </script>
    </body>
    
    </html>
    