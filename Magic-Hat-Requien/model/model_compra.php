<?php
//import da classe banco
require_once("banco.php");

class Compra extends Banco {

    //Cadastrar Compra
    private $qtdd_total;
    private $valor_total;


    //Metodos Set
    public function setQtdd_total($string){
        $this->qtdd_total = $string;
    }
    public function setValor_total($string){
        $this->valor_total = $string;
    }

    //Metodos Get
    //Finalizar compra
    public function getQtdd_total(){
        return $this->qttd_total;
    }
    public function getValor_total(){
        return $this->valor_total;
    }


    //Funções Gerais:
    public function compra(){
        return $this->setCompra();
    }
}
?>
