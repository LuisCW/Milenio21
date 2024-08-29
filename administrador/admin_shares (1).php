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
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="admin_shares.css" />
  <link rel="icon" href="../iconos/milenio21logos/logom21 1.png" />
  <title>Administrador</title>
</head>

<body>
  <header>
    <div class="container">
      <a class="logo" href="Milenio21.php"><img class="logo-img" src="../iconos/milenio21logos/logom21 3.png"
          alt="" /></a>

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
  <div class="language-selector">
    <div class="selected-language">
      <a href="EN/Milenio21.php"><img src="../iconos/estados-unidos.png" alt="US Flag" /></a>
      <a href="FR/Milenio21.php"><img src="../iconos/francia (1).png" alt="US Flag" /></a>
      <a href="CH/Milenio21.php"><img src="../iconos/porcelana (1).png" alt="US Flag" /></a>
    </div>
  </div>

  <div class="main-content">
    <div class="card">
      <div class="card-header">
      </div>
      <form action="base_datos/publicar.php" method="post" enctype="multipart/form-data">
        <h2>Publicar Viviendas</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required>

        <label for="num_habitaciones">Número de habitaciones:</label>
        <input type="number" id="num_habitaciones" name="num_habitaciones" min="1" required>

        <label for="num_banos">Número de baños:</label>
        <input type="number" id="num_banos" name="num_banos" min="1" required>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <label for="ubicacion">Ubicación:</label>
        <div id="map"></div>
        <input type="hidden" id="latitud" name="latitud">
        <input type="hidden" id="longitud" name="longitud">

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" min="0" step="0.01" required>

        <label for="imagenes">Imágenes:</label>
        <input type="file" id="imagenes" name="imagenes[]" multiple required>

        <input type="hidden" id="venta" name="venta" value="1">

        <button type="submit">Publicar</button>
      </form>

    </div>
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
        <option value="Terrenos">Terrenos</option>
        <option value="Edificios">Edificios</option>
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
          <a href="base_datos/<?php echo $fila['id']; ?>.php">
            <img class="foto" src="base_datos/<?php echo $fila['imagen']; ?>" alt="Imagen de propiedad" />
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
                <p><img src="../iconos/dormitorio.png" alt="" />
                  <?php echo $fila['num_habitaciones']; ?> habitaciones
                </p>
                <p><img src="../iconos/inodoro.png" alt="" />
                  <?php echo $fila['num_banos']; ?> baños
                </p>
                <p>
                  <img src="../iconos/marcador-de-posicion.png" alt="" />
                  <?php echo $fila['ciudad']; ?>
                </p>
                <p>Estado: Venta</p>
                <p>
                  <img src="../iconos/signo-de-dolar.png" alt="" /> Precio: $
                  <?php echo number_format($fila['precio'], 0, ',', '.'); ?> MXN
                </p>
              </div>
            </div>
          </a>
        </div>
        <?php
      } ?>
    </section>
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
  <script src="admin_shares.js"></script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMTvHc9OcxTmJHJ5_h3d85ugdArZQdRTw&callback=initMap"></script>

</body>

</html>