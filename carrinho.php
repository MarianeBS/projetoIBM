<?php
	require_once("controller/controller.php");

	$controller = new controller();
	if(isset($_GET['funcao'])){
		$result = $controller->carrinho($_GET['id'], $_GET['produto'], 0);
		if($result == 1){
			echo "<script>document.location='finalizar.php?id=" . $_GET['id'] . "';</script>";
		}
	}else{
		$result = $controller->carrinho($_GET['id'], $_GET['produto'], $_GET['qttd']);
		if($result == 1){
			echo "<script>document.location='produtos.php?id=" . $_GET['id'] . "';</script>";
		}else{
			echo "<script>alert('Você já possui este produto no seu carrinho!');document.location='produtos.php?id=" . $_GET['id'] . "';</script>";
		}
	}

?>