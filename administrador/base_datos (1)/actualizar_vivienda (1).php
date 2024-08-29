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

// Verificar si se ha enviado el formulario
if (isset($_POST['actualizar'])) {
  // Obtener los datos del formulario
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $tipo = $_POST['tipo'];
  $num_habitaciones = $_POST['num_habitaciones'];
  $num_banos = $_POST['num_banos'];
  $ciudad = $_POST['ciudad'];
  $latitud = $_POST['latitud'];
  $longitud = $_POST['longitud'];
  $precio = $_POST['precio'];

  // Actualizar los datos de la vivienda en la base de datos
  $sql = "UPDATE datos_viviendas SET nombre='$nombre', descripcion='$descripcion', tipo='$tipo', num_habitaciones='$num_habitaciones', num_banos='$num_banos', ciudad='$ciudad', latitud='$latitud', longitud='$longitud', precio='$precio' WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    echo '<script>
    window.location = "../admin_shares.php";
</script>';
  } else {
    echo "Error al actualizar los datos de la vivienda: " . mysqli_error($conn);
  }

  // Actualizar las imágenes de la vivienda en la base de datos
  $num_files = count($_FILES['imagenes']['name']);
  $imagenes = array();

  for ($i=0; $i < $num_files; $i++) {
    $imagen_name = $_FILES['imagenes']['name'][$i];
    $imagen_tmp = $_FILES['imagenes']['tmp_name'][$i];
    $imagen_size = $_FILES['imagenes']['size'][$i];
    $imagen_error = $_FILES['imagenes']['error'][$i];

    if ($imagen_error === UPLOAD_ERR_OK) {
      $imagen_info = getimagesize($imagen_tmp);
      $imagen_mime = $imagen_info['mime'];
      $imagen_data = file_get_contents($imagen_tmp);
      $imagen_data = mysqli_real_escape_string($conn, $imagen_data);

      $imagenes[] = "('$id', '$imagen_name', '$imagen_mime', '$imagen_data')";
    } else {
      echo "Error al subir la imagen: " . $imagen_error;
    }
  }

  if (!empty($imagenes)) {
    $sql = "INSERT INTO fotos (vivienda_id, nombre, mime, data) VALUES " . implode(',', $imagenes);

    if (mysqli_query($conn, $sql)) {
        echo '<script>
        window.location = "../admin_shares.php";
    </script>';
    } else {
      echo "Error al actualizar las imágenes de la vivienda: " . mysqli_error($conn);
    }
  }
}

// Cerrar la conexión con la base de datos
mysqli_close($conn);
?>
