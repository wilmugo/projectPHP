<?php
$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el cliente';
    exit;
}
include_once "funciones.php";

$resultado = eliminarCategoria($id);
if(!$resultado){
    echo "Error al eliminar";
    return;
}

header("Location: categorias.php");
?>