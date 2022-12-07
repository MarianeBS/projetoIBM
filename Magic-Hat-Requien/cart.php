<?php
	require_once("controller/controller.php");
	require_once("model/banco.php");

	$controller = new controller();
	$banco = new Banco();
	session_start();
	if(isset($_GET['funcao'])){
		$result = $controller->carrinho($_SESSION['id_cliente'], $_GET['produto'], 0);
		if($result == 1){
			echo "<script>document.location='carrinho.php';</script>";
		}

	}else if(isset($_GET['int'])){
		$banco->updateCarrinho($_SESSION['id_cliente'], $_GET['produto'], $_GET['qttd']);
		echo "<script>document.location='carrinho.php'</script>";

	}else{
		$result = $controller->carrinho($_SESSION['id_cliente'], $_GET['produto'], $_GET['qttd']);
		if($result == 1){
			echo "<script>document.location='carrinho.php'</script>";
		}else{
			echo "<script>alert('Você já possui este produto no seu carrinho!');document.location='produtos.php';</script>";
		}
	}

?>