<?php


function eliminar_dir() {
    $path=$_POST['ruta'];
	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? eliminar_dir($file) : unlink($file);
	}
	rmdir($path);

	return;
}

 

 ?>