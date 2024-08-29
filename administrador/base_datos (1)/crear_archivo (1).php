<?php
$conn = mysqli_connect("SSO Signon","jbhe45033595085","","viviendas");

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT id, nombre FROM datos_viviendas";
$resultado = mysqli_query($conn, $sql);

while ($fila = mysqli_fetch_assoc($resultado)) {
    // Crear un archivo con el nombre de la vivienda y extensión .php
    $nombre_archivo = $fila['id'] . '.php';
    
    // Abrir el archivo para escritura
    $idEstablecido = $fila["id"];
    $archivo = fopen($nombre_archivo, 'w');
    
    // Escribir el contenido del archivo
    fwrite($archivo, 
    '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="vivienda.css" />
        <link rel="icon" href="../../iconos/milenio21logos/logom21 1.png" />
        <title>Administrador</title>
    </head>
    
    <body>
        <div class="ocultar"></div>
        <header>
            <div class="container">
                <a class="logo" href="../../Milenio21.php"><img class="logo-img"
                        src="../../iconos\milenio21logos/logom21 3.png" alt="" /></a>
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
        <?php
    
        // Establecer la conexión con la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "viviendas";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        // Verificar si la conexión se realizó correctamente
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Obtener el ID seleccionado
        $idSeleccionado = '.$idEstablecido.';
    
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
            <h2 class="titulo"><?php echo $nombre; ?></h2>
            <div class="gallery-info">
                <p>
                    <?php echo $descripcion; ?>
                </p>
                <ul>
                    <li>
                        <img src="../../iconos/dormitorio.png" alt="" />
                        Recamaras: <?php echo $num_habitaciones; ?>
                        <img src="../../iconos/inodoro.png" alt="" />
                        Baños: <?php echo $num_banos; ?>
                    </li>
                    <li>
                        <img src="../../iconos/marcador-de-posicion.png" alt="" />
                        <?php echo $ciudad; ?> México
                    </li>
                    <li>
                        <img src="../../iconos/signo-de-dolar.png" alt="" />
                        Precio: $ <?php echo number_format($precio, 0, ",", "."); ?> MXN
                    </li>
                </ul>
            </div>
            <div class="slider">
                <div class="slider__wrapper">
                    <?php foreach ($fotos as $foto): ?>
                        <div class="slider__slide">
                            <img src="<?php echo $foto; ?>" alt="Imagen de <?php echo $nombre; ?>" class="gallery-image">
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
            <section class="ZonaDeContacto">
                <form class="formulario" action="actualizar_vivienda.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
    
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" required><?php echo $descripcion; ?></textarea>
    
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>" required>
    
                    <label for="num_habitaciones">Número de habitaciones:</label>
                    <input type="number" id="num_habitaciones" name="num_habitaciones" value="<?php echo $num_habitaciones; ?>"
                        min="1" required>
    
                    <label for="num_banos">Número de baños:</label>
                    <input type="number" id="num_banos" name="num_banos" value="<?php echo $num_banos; ?>" min="1" required>
    
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" value="<?php echo $ciudad; ?>" required>
    
                    <label for="ubicacion">Ubicación:</label>
                    <div id="map" style="height: 300px;"></div>
                    <input type="hidden" id="latitud" name="latitud" value="<?php echo $latitud; ?>">
                    <input type="hidden" id="longitud" name="longitud" value="<?php echo $longitud; ?>">
    
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" min="0" step="0.01" required>
    
                    <label for="imagenes">Imágenes:</label>
                    <input type="file" id="imagenes" name="imagenes[]" multiple>
    
                    <br>
    
                    <button type="submit" class="btn btn-actualizar" name="actualizar">Actualizar</button>
                </form>
                <form class="borrarV" action="borrar_vivienda.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-borrar" name="borrar">Borrar</button>
                </form>
            </section>
            <?php
        } else {
            echo "No se encontraron resultados para el ID seleccionado";
        }
    
        // Cerrar la conexión con la base de datos
        mysqli_close($conn);
    
        ?>
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
                    zoom: 12
                });
                var marker_<?php echo $id; ?> = new google.maps.Marker({
                    position: {
                        lat: <?php echo $latitud; ?>,
                        lng: <?php echo $longitud; ?>
                    },
                    map: map_<?php echo $id; ?>,
                    title: "<?php echo $nombre; ?>"
                });
                // Crea el mapa
                var map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 13,
                    center: {
                        lat: 21.158639,
                        lng: -86.809048
                    } // San Francisco por defecto
                });
                // Agrega el marcador cuando se hace clic en el mapa
                var marker = new google.maps.Marker({
                    map: map
                });
                map.addListener("click", function (event) {
                    marker.setPosition(event.latLng);
                    document.getElementById("latitud").value = event.latLng.lat();
                    document.getElementById("longitud").value = event.latLng.lng();
                });
            }
        </script>
    </body>
    
    </html>
    '
    );
    
    // Cerrar el archivo
    fclose($archivo);

    //Crear el archivo de publicacion
    echo '<script>
                window.location = "crear_publicacion.php";
            </script>';
}       
?>