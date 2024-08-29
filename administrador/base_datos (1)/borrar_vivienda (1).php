<?php
$connect = new mysqli("SSO Signon","jbhe45033595085","","viviendas");

if (mysqli_connect_errno()) {
    echo 'Conexion Fallida: ' . mysqli_connect_error();
    exit();
}

if (isset($_POST['borrar'])) {
    $id = trim($_POST['id']);

    // Eliminar fotos asociadas a la vivienda
    $query_fotos = "SELECT imagen FROM fotos WHERE vivienda_id = '$id'";
    $result_fotos = mysqli_query($connect, $query_fotos);

    if (!$result_fotos) {
        echo 'Error al obtener las fotos: ' . mysqli_error($connect);
        exit();
    }

    while ($row_fotos = mysqli_fetch_assoc($result_fotos)) {
        $foto = $row_fotos["imagen"];
        if (file_exists($foto)) {
            unlink($foto);
        }
    }

    // Eliminar registros de fotos de la tabla fotos
    $query_delete_fotos = "DELETE FROM fotos WHERE vivienda_id = '$id'";
    $result_delete_fotos = mysqli_query($connect, $query_delete_fotos);

    if (!$result_delete_fotos) {
        echo 'Error al borrar las fotos: ' . mysqli_error($connect);
        exit();
    }

    // Eliminar archivo con el nombre del ID de la vivienda
    $ruta_archivo = $id . ".php";
    if (file_exists($ruta_archivo)) {
        unlink($ruta_archivo);
    }

    // Eliminar vivienda de la tabla datos_viviendas
    $query_delete = "DELETE FROM datos_viviendas WHERE id = '$id'";
    $result_delete = mysqli_query($connect, $query_delete);

    if (!$result_delete) {
        echo 'Error al borrar la vivienda: ' . mysqli_error($connect);
        exit();
    }

    header("Location: ../admin_shares.php");
    exit();
}
?>
