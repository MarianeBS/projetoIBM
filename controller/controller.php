<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/Magic-Hat-Requien/model/cadastro.php");
class controller{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastro"){
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
            $this->editar($_GET['id']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "login"){
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPass'];
            $this->login($login, $password);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "contato"){
            $this->contato();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "pesquisar"){
            $this->pesquisar();
        }
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setSobrenome($_POST['txtSobrenome']);
        $this->cadastro->setEmail($_POST['txtEmail']);
        $this->cadastro->setSenha($_POST['txtSenha']);
        $this->cadastro->setEndereco($_POST['txtEndereco']);
        $this->cadastro->setBairro($_POST['txtBairro']);
        $this->cadastro->setCep($_POST['txtCep']);
        $this->cadastro->setCidade($_POST['txtCidade']);
        $this->cadastro->setEstado($_POST['txtEstado']);
        $this->cadastro->setPreferencia($_POST['cboCategorias']);
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../login.html'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');</script>";
        }
    }

    public function pesquisar($pesquisa){
        $result = $this->cadastro->pesquisa($pesquisa);
        if($result >= 1){
            return $result;
        }else{
            echo "<script>alert('Que pena...Não temos produtos com esse nome...');document.location='produtos.html';</script>";
        }
        
    }

    private function contato(){
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setEmail($_POST['txtEmail']);
        $this->cadastro->setAssunto($_POST['txtAssunto']);
        $this->cadastro->setMensagem($_POST['txtMensagem']);
        $result = $this->cadastro->contato();
        if($result >= 1){
            echo "<script>alert('Sua mensagem foi enviada com sucesso! Entraremos em contato pelo seu e-mail de 1 a 3 dias úteis!');document.location='../faleconosco.html'</script>";
        }else{
            echo "<script>alert('Erro ao enviar mensagem!');</script>";
        }
    }

    private function login($login, $password){
        $result = $this->cadastro->login($login, $password);
        if($result >= 1){
            echo "<script>alert('Login Efetuado com sucesso!');document.location='../index.php?id=" . $result . "'</script>";
        }else{
            echo "<script>alert('E-mail e/ou senha incorretos! Tente Novamente!');document.location='../login.html'</script>";
        }
    }

    private function cliente($id){
        $result = $this->cadastro->login($id);
        if($result >= 1){
            echo "<script>alert('Login Efetuado com sucesso!');document.location='../index.php?id=" . $result . "'</script>";
        }else{
            echo "<script>alert('E-mail e/ou senha incorretos! Tente Novamente!');document.location='../login.html'</script>";
        }
    }

    public function captar($id){
        return $result = $this->cadastro->captar($id);
    }

    private function editar($id){
        $this->cadastro->setId($id);
        $this->cadastro->setNome($_POST['txtNome']);
        $this->cadastro->setEmail($_POST['txtEmail']);
        $this->cadastro->setSenha($_POST['txtSenha']);
        $this->cadastro->setEndereco($_POST['txtEndereco']);
        $this->cadastro->setBairro($_POST['txtBairro']);
        $this->cadastro->setCep($_POST['txtCep']);
        $this->cadastro->setCidade($_POST['txtCidade']);
        $this->cadastro->setEstado($_POST['txtEstado']);
        $result = $this->cadastro->editar();
        if($result >= 1){
            echo "<script>alert('Registro alterado com sucesso!');document.location='../consulta.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar o registro!');</script>";
        }
    }

    public function excluir($id){
        $result = $this->cadastro->excluir($id);
        if($result >= 1){
            echo "<script>alert('Registro excluido com sucesso!');document.location='consulta.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o registro!');</script>";
        }
    }
}
new controller();
?>
