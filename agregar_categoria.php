<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

?>
<div class="container">
    <h3>Agregar Categoria</h3>
    <form method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Categoria</label>
            <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Nombre de la Categoria">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion de la Categoria">
        </div>

        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a href="clientes.php" class="btn btn-danger btn-lg">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    if(empty($categoria) 
    || empty($descripcion)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    
    include_once "funciones.php";
    $resultado = registrarCategoria($categoria, $descripcion);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Categoria registrada con éxito.
        </div>';
    }
    
}
?>