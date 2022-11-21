<?php
//import da classe banco
require_once("banco.php");

class Produto extends Banco {

    //Declaração das Variáveis
    //Pesquisa
    private $pesquisa;

    //Cadastrar Produto
    private $id;
    private $nomeProd;
    private $categoriaProd;
    private $tipo1;
    private $tipo2;
    private $faixaProd;
    private $quantProd;
    private $marcaProd;
    private $valorProd;
    private $materialProd;
    private $descProd;

    //Metodos Set
    public function setPesquisa($string){
        $this->pesquisa = $string;
    }
    public function setId($string){
        $this->id = $string;
    }
    public function setNomeProd($string){
        $this->nomeProd = $string;
    }
    public function setCategoriaProd($string){
        $this->categoriaProd = $string;
    }
    public function setTipo1($string){
        $this->tipo1 = $string;
    }
    public function setTipo2($string){
        $this->tipo2 = $string;
    }
    public function setFaixaProd($string){
        $this->faixaProd = $string;
    }
    public function setQuantProd($string){
        $this->quantProd = $string;
    }
    public function setMarcaProd($string){
        $this->marcaProd = $string;
    }
    public function setValorProd($string){
        $this->valorProd = $string;
    }
    public function setMaterialProd($string){
        $this->materialProd = $string;
    }
    public function setDescProd($string){
        $this->descProd = $string;
    }

    //Metodos Get
    //Produto
    public function getNomeProd(){
        return $this->nomeProd;
    }
    public function getId(){
        return $this->id;
    }
    public function getCategoriaProd(){
        return $this->categoriaProd;
    }
    public function getTipo1(){
        return $this->tipo1;
    }
    public function getTipo2(){
        return $this->tipo2;
    }
    public function getFaixaProd(){
        return $this->faixaProd;
    }
    public function getQuantProd(){
        return $this->quantProd;
    }
    public function getMarcaProd(){
        return $this->marcaProd;
    }
    public function getValorProd(){
        return $this->valorProd;
    }
    public function getMaterialProd(){
        return $this->materialProd;
    }
    public function getDescProd(){
        return $this->descProd;
    }

    //Funções Gerais:
    public function incluirProd(){
        return $this->setProduto($this->getNomeProd(),$this->getCategoriaProd(),$this->getTipo1(),$this->getTipo2(),$this->getFaixaProd(),$this->getQuantProd(),$this->getMarcaProd(),$this->getValorProd(),$this->getMaterialProd(),$this->getDescProd());
    }

    public function updateProd(){
        return $this->updateProduto($this->getId(),$this->getNomeProd(),$this->getCategoriaProd(),$this->getTipo1(),$this->getTipo2(),$this->getFaixaProd(),$this->getQuantProd(),$this->getMarcaProd(),$this->getValorProd(),$this->getMaterialProd(),$this->getDescProd());
    }

    public function pesquisar($pesquisa, $var){
        return $this->getItem($pesquisa, $var);
    }

    public function carrinho($id_cliente, $id_produto, $qttd){
        return $this->getCarrinho($id_cliente, $id_produto, $qttd);
    }

    public function excluirProd($id){
        return $this->deleteProd($id);
    }
}
?>
