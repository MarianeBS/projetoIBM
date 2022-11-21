<?php
require_once("../controller/controller.php");

if(isset($_GET['id']) && $_GET['id'] == 1){

    session_start();
    session_destroy();
    echo "<script>document.location='../index.php'</script>";

}else if(isset($_GET['id']) && $_GET['id'] == 2){

	$controller = new controller();
	$resultado = $controller->excluirCad();

}else if(isset($_GET['id']) && $_GET['id'] == 3){

	$controller = new controller();
	$resultado = $controller->excluirProd($_GET['id_produto']);

}
?>