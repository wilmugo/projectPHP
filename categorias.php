<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$categorias = obtenerCategorias();
?>
<div class="container">
    <h1>
        <a class="btn btn-success btn-lg" href="agregar_categoria.php">
            <i class="fa fa-plus"></i>
            Agregar
        </a>
        Categorias
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($categorias as $categoria){
            ?>
                <tr>
                    <td><?php echo $categoria->categoria; ?></td>
                    <td><?php echo $categoria->descripcion; ?></td>
                    <td>
                        <a class="btn btn-info" href="editar_categoria.php?id=<?php echo $categoria->id;?>">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="eliminar_categoria.php?id=<?php echo $categoria->id;?>">
                            <i class="fa fa-trash"></i>
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>