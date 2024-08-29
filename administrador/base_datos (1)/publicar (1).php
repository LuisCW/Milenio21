<?php
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$num_habitaciones = $_POST['num_habitaciones'];
$num_banos = $_POST['num_banos'];
$ciudad = $_POST['ciudad'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$precio = $_POST['precio'];
$venta = $_POST['venta'];

// Aquí se insertaría el registro en la base de datos
$imagenes = array();

if (isset($_FILES['imagenes'])) {
    $errors = array();

    foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['imagenes']['name'][$key];
        $file_size = $_FILES['imagenes']['size'][$key];
        $file_tmp = $_FILES['imagenes']['tmp_name'][$key];
        $file_type = $_FILES['imagenes']['type'][$key];

        if ($file_size > 200097152) {
            $errors[] = 'El archivo debe ser menor a 200 MB';
        }

        $extensions = array("jpeg", "jpg", "png");
        $file_ext = explode('.', $file_name);
        $file_ext = end($file_ext);

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Extensión no permitida, por favor elija una imagen JPEG o PNG.";
        }

        if (empty($errors) == true) {
            $dir = "imagenes/";
            if (!is_dir($dir)) {
                mkdir($dir);
            }

            $new_file_name = $dir . $nombre . "_" . ($key + 1) . "." . $file_ext;
            move_uploaded_file($file_tmp, $new_file_name);
            $imagenes[] = $new_file_name;
        }
    }

    if (empty($errors) == true) {
        $conn = mysqli_connect("SSO Signon","jbhe45033595085","","viviendas");

        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO datos_viviendas (nombre, descripcion, tipo, num_habitaciones, num_banos, ciudad, latitud, longitud, precio, venta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "sssiisdddi", $nombre, $descripcion, $tipo, $num_habitaciones, $num_banos, $ciudad, $latitud, $longitud, $precio, $venta);

        if (mysqli_stmt_execute($stmt)) {
            $vivienda_id = mysqli_insert_id($conn);

            $sql = "INSERT INTO fotos (vivienda_id, imagen) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, "is", $vivienda_id, $imagen);

            foreach ($imagenes as $imagen) {
                mysqli_stmt_execute($stmt);
            }        

            echo '<script>
                window.location = "crear_archivo.php";
            </script>';
        } else {
            echo "Error al insertar los datos.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
}
?>