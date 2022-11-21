<?php
//import da classe banco
require_once("banco.php");

class Cliente extends Banco {

    //Declaração das Variáveis
    //Usuário
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $endereco;
    private $num;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $preferencia;

    //Fale Conosco
    private $assunto;
    private $mensagem;

    //Metodos Set
    public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setSobrenome($string){
        $this->sobrenome = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setSenha($string){
        $this->senha = $string;
    }
    public function setEndereco($string){
        $this->endereco = $string;
    }
    public function setNum($string){
        $this->num = $string;
    }
    public function setBairro($string){
        $this->bairro = $string;
    }
    public function setCep($string){
        $this->cep = $string;
    }
    public function setCidade($string){
        $this->cidade = $string;
    }
    public function setEstado($string){
        $this->estado = $string;
    }
    public function setPreferencia($string){
        $this->preferencia = $string;
    }
    public function setAssunto($string){
        $this->assunto = $string;
    }
    public function setMensagem($string){
        $this->mensagem = $string;
    }

    //Metodos Get
    //Cliente
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getNum(){
        return $this->num;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getCidade(){
        return $this->cidade;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getPreferencia(){
        return $this->preferencia;
    }

    //Fale conosco
    public function getAssunto(){
        return $this->assunto;
    }
    public function getMensagem(){
        return $this->mensagem;
    }

    //Funções Gerais:
    public function incluir(){
        return $this->setCadastro($this->getNome(),$this->getSobrenome(),$this->getEmail(),$this->getSenha(),$this->getEndereco(),$this->getNum(),$this->getBairro(),$this->getCep(),$this->getCidade(),$this->getEstado(),$this->getPreferencia());
    }

    public function contato(){
        return $this->setContato($this->getNome(),$this->getEmail(),$this->getAssunto(),$this->getMensagem());
    }

    public function captar($id){
        return $this->getCliente($id);
    }

    public function editar(){
        return $this->updateCliente($this->getId(),$this->getNome(),$this->getSobrenome(),$this->getEmail(),$this->getSenha(),$this->getEndereco(),$this->getNum(),$this->getBairro(),$this->getCep(),$this->getCidade(),$this->getEstado(),$this->getPreferencia());
    }

    public function excluirCad(){
        return $this->deleteCliente();
    }
}
?>
