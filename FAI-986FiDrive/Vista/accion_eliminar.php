<?php
include_once "./estructura/cabecera.php";
include_once "../Control/control_archivos.php";

?>
<div id="contenido" style="height: 100%; width: 100%; border: 2px solid green; border-radius:3px;">

<?php
$obj = new control_archivos();

$msg=$obj->eliminar_dir($_POST);
// $msg=$obj->eliminar_dir3($_POST);
// $msg2=$obj->eliminar_dir2($_POST);
// $msg3=$obj->deleteDir($_POST);

?>




<div class="alert alert-success col-md-3 offset-md-2" role="alert">
    <h1></h1>
<?php echo $msg ?>
</div>



</div>


<?php
include_once "./estructura/pie.php";
?>