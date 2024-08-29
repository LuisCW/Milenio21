<!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="vivienda.css" />
      <link rel="icon" href="../../../iconos/milenio21logos/logom21 1.png" />
      <title>千禧 21 地产</title>
    </head>
    
    <body>
      <div class="ocultar"></div>
      <header>
        <div class="container">
          <a class="logo" href="../../Milenio21.php"><img class="logo-img"
              src="../../../iconos\milenio21logos/logom21 3.png" alt="" /></a>
          <div class="menu">
            <ul class="menu-items hidden">
              <li><a href="../../Milenio21.php"> 首页</a></li>
              <li><a href="../../Milenio21.php#propiedades"> 房产</a></li>
              <li><a href="../../Milenio21.php#contacto"> 联系我们</a></li>
              <li><a href="../../about.php"> 关于我们</a></li>
            </ul>
          </div>
        </div>
      </header>
      <div class="language-selector">
        <div class="selected-language">
          <a href="#"><img src="../../../iconos/estados-unidos.png" alt="US Flag" /></a>
          <a href="#"><img src="../../../iconos/francia (1).png" alt="US Flag" /></a>
          <a href="#"><img src="../../../iconos/porcelana (1).png" alt="US Flag" /></a>
        </div>
      </div>
      <div class="whatsapp">
        <div class="selected-whattsapp">
          <a href="https://wa.me/529984596417"><img src="../../../iconos/whatsapp-64.png" alt="whatsapp" width="50px" /></a>
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
        // Texto a traducir
        $textoNombre = $row["nombre"];
        $textoDescripcion = $row["descripcion"];
        $textoLugar = $row["ciudad"];
    
        // Idiomas de destino
        $idiomasDestino = array("en", "fr", "zh");
    
        // Array para almacenar las traducciones de nombre y descripción
        $traduccionesNombre = array();
        $traduccionesDescripcion = array();
        $traduccionesLugar = array();
    
        // Realiza la solicitud de traducción para cada idioma
        foreach ($idiomasDestino as $idioma) {
          // URL de la API de Google Translate
          $url = "https://translation.googleapis.com/language/translate/v2?key=AIzaSyBMTvHc9OcxTmJHJ5_h3d85ugdArZQdRTw";
    
          // Configura los datos de la solicitud para el nombre
          $datosNombre = array(
            "q" => $textoNombre,
            "source" => "es",
            "target" => $idioma,
            "format" => "text"
          );
    
          // Realiza la solicitud POST a la API de Google Translate para el nombre
          $chNombre = curl_init();
          curl_setopt($chNombre, CURLOPT_URL, $url);
          curl_setopt($chNombre, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($chNombre, CURLOPT_POSTFIELDS, http_build_query($datosNombre));
          $respuestaNombre = curl_exec($chNombre);
          curl_close($chNombre);
    
          // Decodifica la respuesta JSON para el nombre
          $traduccionNombre = json_decode($respuestaNombre, true);
    
          // Extrae el texto traducido para el nombre
          $textoTraducidoNombre = $traduccionNombre["data"]["translations"][0]["translatedText"];
    
          // Almacena la traducción del nombre en el array
          $traduccionesNombre[$idioma] = $textoTraducidoNombre;
    
          // Configura los datos de la solicitud para la descripción
          $datosDescripcion = array(
            "q" => $textoDescripcion,
            "source" => "es",
            "target" => $idioma,
            "format" => "text"
          );
    
          // Realiza la solicitud POST a la API de Google Translate para la descripción
          $chDescripcion = curl_init();
          curl_setopt($chDescripcion, CURLOPT_URL, $url);
          curl_setopt($chDescripcion, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($chDescripcion, CURLOPT_POSTFIELDS, http_build_query($datosDescripcion));
          $respuestaDescripcion = curl_exec($chDescripcion);
          curl_close($chDescripcion);
    
          // Decodifica la respuesta JSON para la descripción
          $traduccionDescripcion = json_decode($respuestaDescripcion, true);
    
          // Extrae el texto traducido para la descripción
          $textoTraducidoDescripcion = $traduccionDescripcion["data"]["translations"][0]["translatedText"];
    
          // Almacena la traducción de la descripción en el array
          $traduccionesDescripcion[$idioma] = $textoTraducidoDescripcion;
    
          // Configura los datos de la solicitud para el lugar
          $datosLugar = array(
            "q" => $textoLugar,
            "source" => "es",
            "target" => $idioma,
            "format" => "text"
          );
    
          // Realiza la solicitud POST a la API de Google Translate para el Lugar
          $chLugar = curl_init();
          curl_setopt($chLugar, CURLOPT_URL, $url);
          curl_setopt($chLugar, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($chLugar, CURLOPT_POSTFIELDS, http_build_query($datosLugar));
          $respuestaLugar = curl_exec($chLugar);
          curl_close($chLugar);
    
          // Decodifica la respuesta JSON para el Lugar
          $traduccionLugar = json_decode($respuestaLugar, true);
    
          // Extrae el texto traducido para el Lugar
          $textoTraducidoLugar = $traduccionLugar["data"]["translations"][0]["translatedText"];
    
          // Almacena la traducción del Lugar en el array
          $traduccionesLugar[$idioma] = $textoTraducidoLugar;
        }
    
        $nombreChino = $traduccionesNombre["zh"];
    
        $descripcionChino = $traduccionesDescripcion["zh"];
    
        $lugarChino = $traduccionesLugar["zh"];
        // Código HTML para mostrar los datos y las fotos
        ?>
        <h2 class="titulo">
          <?php echo $nombreChino; ?>
        </h2>
        <div class="gallery-info">
          <p>
            <?php echo $descripcionChino; ?>
          </p>
          <ul>
            <li>
              <img src="../../../iconos/dormitorio.png" alt="" />
              卧室:
              <?php echo $num_habitaciones; ?>
              <img src="../../../iconos/inodoro.png" alt="" />
              浴室:
              <?php echo $num_banos; ?>
            </li>
            <li>
              <img src="../../../iconos/marcador-de-posicion.png" alt="" />
              <?php echo $lugarChino; ?> 墨西哥
            </li>
            <li>
              <img src="../../../iconos/signo-de-dolar.png" alt="" />
              价格: $
              <?php echo number_format($precio, 0, ",", "."); ?> MXN
            </li>
          </ul>
        </div>
        <div class="slider">
          <div class="slider__wrapper">
            <?php foreach ($fotos as $foto): ?>
              <div class="slider__slide">
                <img src="../../../administrador/base_datos/<?php echo $foto; ?>" alt="Imagen de <?php echo $nombre; ?>"
                  class="gallery-image">
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
        <form action="https://formsubmit.co/mexicanrealtyhomes@gmail.com" method="POST">
          <h2>联系方式</h2>
          <label for="name">姓名:</label>
          <input type="text" id="name" name="name" required>
    
          <label for="phone">电话:</label>
          <input type="number" id="phone" name="phone" required>
    
          <label for="email">电子邮件:</label>
          <input type="email" id="email" name="email" required>
    
          <label for="message">留言:</label>
          <textarea id="message" name="message" rows="4" required></textarea>
    
          <input type="submit" value="Enviar">
    
          <input type="hidden" name="_next" value="Milenio21.html">
          <input type="hidden" name="_captcha" value="false">
        </form>
      </section>
    
      <footer>
        <div class="footer-content">
          <div class="contacto">
            <h3>联系我们</h3>
            <p><i class="fas fa-envelope"></i> mexicanrealtyhomes@gmail.com <br> rgbvegas@gmail.com</p>
            <p><img src="../../../iconos/mexico.png" alt=""> +52 99 84 59 64 17 </p>
            <p><img src="../../../iconos/estados-unidos (1).png" alt=""> +1 702 219 69 11</p>
            <p>
              <i class="fas fa-map-marker-alt"></i> 墨西哥坎昆昆坦那罗州77536
            </p>
          </div>
        </div>
        <div class="copyrigth">
          <p>&copy; 2023年Milenio 21 Realty。版权所有。</p>
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
    