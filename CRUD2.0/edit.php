<?php
include("db.php");
$Nombre = '';
$Descripcion= '';
$Codigo= '';
$Stock= '';
$Precio= '';

if  (isset($_GET['Codigo'])) {
  $id = $_GET['Codigo'];
  $query = "SELECT * FROM producto WHERE Codigo=$id";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Descripcion = $row['Descripcion'];
    $Stock = $row['Stock'];
    $Precio = $row['Precio'];
  }
}


if (isset($_POST['update'])) {
  $Codigo = $_GET['Codigo'];
  $Nombre= $_POST['Nombre'];
  $Descripcion = $_POST['Descripcion'];
  $Stock = $_POST['Stock'];
  $Precio = $_POST['Precio'];

  $query = "UPDATE producto set Nombre = '$Nombre', Descripcion = '$Descripcion', Stock = '$Stock', Precio = '$Precio' WHERE Codigo=$Codigo";
  mysqli_query($con, $query);
  $_SESSION['message'] = 'Producto modificado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?Codigo=<?php echo $_GET['Codigo']; ?>" method="POST">
        <!-- 
        <div class="form-group">
          <input name="Codigo" type="int" class="form-control" value="<?php echo $Codigo; ?>" placeholder="Codigo">
        </div>
        -->
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Nombre">
        </div>
        <div class="form-group">
        <textarea name="Descripcion" class="form-control" cols="30" rows="10" placeholder="Modificar descripcion"><?php echo $Descripcion;?></textarea> 
        </div>
         <div class="form-group">
          <input name="Stock" type="int" class="form-control" value="<?php echo $Stock; ?>" placeholder="Stock">
        </div>
        <div class="form-group">
          <input name="Precio" type="int" class="form-control" value="<?php echo $Precio; ?>" placeholder="Precio">
        </div>
        <button class="btn-success" name="update">
          Modificar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
