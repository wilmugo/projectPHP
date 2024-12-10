<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el cliente';
    exit;
}
include_once "funciones.php";
$categoria = obtenerCategoriaPorId($id);
?>

<div class="container">
    <h3>Editar Categoria</h3>
    <form method="post">
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" class="form-control" value="<?php echo $categoria->categoria;?>" id="categoria" placeholder="Escribe el nombre de la categoria">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" value="<?php echo $categoria->descripcion;?>" id="descripcion" placeholder="Descripcion de la categoria">
        </div>

        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a href="categorias.php" class="btn btn-danger btn-lg">
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
    $resultado = editarCategoria($categoria, $descripcion, $id);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Información del cliente actualizada con éxito.
        </div>';
    }
    
}
?>