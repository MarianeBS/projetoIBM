<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/Magic-Hat-Requien/model/model_compra.php");
require_once("$root/Magic-Hat-Requien/model/model_produto.php");
require_once("$root/Magic-Hat-Requien/model/model_cliente.php");
require_once("$root/Magic-Hat-Requien/model/banco.php");
class controller{

    private $compra;
    private $produto;
    private $cliente;
    private $banco;

    public function __construct(){
        $this->compra = new Compra();
        $this->produto = new Produto();
        $this->cliente = new Cliente();
        $this->banco = new Banco();

        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastro"){
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
            $this->editar($_GET['id']);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "login"){
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPass'];
            $this->loginCliente($login, $password);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "contato"){
            $this->contato();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "pesquisar"){
            $this->pesquisar();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "admin"){
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPass'];
            $this->loginAdmin($login, $password);
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastroProd"){
            $this->incluirProd();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "compra"){
            $this->compra();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editarProd"){
            $this->updateProd();
        }
    }

    private function incluir(){
        $this->cliente->setNome($_POST['txtNome']);
        $this->cliente->setSobrenome($_POST['txtSobrenome']);
        $this->cliente->setEmail($_POST['txtEmail']);
        $this->cliente->setSenha($_POST['txtSenha']);
        $this->cliente->setEndereco($_POST['txtEndereco']);
        $this->cliente->setNum($_POST['txtNum']);
        $this->cliente->setBairro($_POST['txtBairro']);
        $this->cliente->setCep($_POST['txtCep']);
        $this->cliente->setCidade($_POST['txtCidade']);
        $this->cliente->setEstado($_POST['txtEstado']);
        $this->cliente->setPreferencia($_POST['cboCategorias']);
        $result = $this->cliente->incluir();
        if($result >= 1){
            echo "<script>alert('Cadastro realizado com sucesso!');document.location='../login.php'</script>";
        }else{
            echo "<script>alert('Erro ao enviar cadastro!');</script>";
        }
    }

    private function compra(){
        $result = $this->compra->compra();
        if($result >= 1){
            echo "<script>alert('Compra realizada com sucesso! Agradecemos a preferência e desejamos ótimos momentos com os brinquedos!');document.location='../produtos.php'</script>";
        }else{
            echo "<script>alert('Erro ao finalizar a compra! Tente novamente mais tarde!');</script>";
        }
    }

    private function getImage(){
        $location = "../img/produtos/";

        $file1 = $_FILES['img1']['name'];
        $file_tmp1 = $_FILES['img1']['tmp_name'];
        $file_ext1 = explode(".",  $file1);
        $file_ext1 = strtolower(array_pop($file_ext1));

        $file2 = $_FILES['img2']['name'];
        $file_tmp2 = $_FILES['img2']['tmp_name'];
        $file_ext2 = explode(".",  $file2);
        $file_ext2 = strtolower(array_pop($file_ext2));

        $file3 = $_FILES['img3']['name'];
        $file_tmp3 = $_FILES['img3']['tmp_name'];
        $file_ext3 = explode(".",  $file3);
        $file_ext3 = strtolower(array_pop($file_ext3));

        $expensions = array("jpg");

        $data = [];
        $data = [$file1, $file2, $file3];
        $images = implode(' ', $data);

        if (in_array($file_ext1, $expensions) === false && in_array($file_ext2, $expensions) === false && in_array($file_ext3, $expensions) === false){
            echo "erro";
        } else {
            move_uploaded_file($file_tmp1, $location . $file1);
            move_uploaded_file($file_tmp2, $location . $file2);
            move_uploaded_file($file_tmp3, $location . $file3);
        }
    }

    private function incluirProd(){
        $this->getImage();
        $this->produto->setNomeProd($_POST['txtNomeProd']);
        $this->produto->setCategoriaProd($_POST['cboCategoriaProd']);
        $this->produto->setTipo1($_POST['cboPrimeiroTipo']);
        $this->produto->setTipo2($_POST['cboSegundoTipo']);
        $this->produto->setFaixaProd($_POST['cboFaixaEt']);
        $this->produto->setQuantProd($_POST['numberQuant']);
        $this->produto->setMarcaProd($_POST['txtMarca']);
        $this->produto->setValorProd($_POST['txtValor']);
        $this->produto->setMaterialProd($_POST['txtMaterial']);
        $this->produto->setDescProd($_POST['txtDescr']);
        $result = $this->produto->incluirProd();
        if($result >= 1){
            echo "<script>alert('Produto incluído com sucesso!');document.location='../cadastro_produto.php'</script>";
        }else{
            echo "<script>alert('Erro ao incluir produto!');document.location='../cadastro_produto.php'</script>";
        }
    }

    private function updateProd(){
        $this->getImage();
        $this->produto->setId($_GET['id']);
        $this->produto->setNomeProd($_POST['txtNomeProd']);
        $this->produto->setCategoriaProd($_POST['cboCategoriaProd']);
        $this->produto->setTipo1($_POST['cboPrimeiroTipo']);
        $this->produto->setTipo2($_POST['cboSegundoTipo']);
        $this->produto->setFaixaProd($_POST['cboFaixaEt']);
        $this->produto->setQuantProd($_POST['numberQuant']);
        $this->produto->setMarcaProd($_POST['txtMarca']);
        $this->produto->setValorProd($_POST['txtValor']);
        $this->produto->setMaterialProd($_POST['txtMaterial']);
        $this->produto->setDescProd($_POST['txtDescr']);
        $result = $this->produto->updateProd();
        if($result >= 1){
            echo "<script>alert('Produto atualizado com sucesso!');document.location='../catalogo_editavel.php'</script>";
        }else{
            echo "<script>alert('Erro ao editar produto!');document.location='../catalogo_editavel.php'</script>";
        }
    }

    public function pesquisar($pesquisa, $var){
        $result = $this->produto->pesquisar($pesquisa, $var);
        if($result >= 1){
            return $result;
        }else{
            echo "<script>alert('Que pena...Não temos produtos com esse nome...');document.location='produtos.php';</script>";
        }
        
    }

    public function getProd($id_prod){
        $result = $this->banco->getProd($id_prod);
        if($result >= 1){
            return $result;
        }else{
            echo "<script>alert('Não conseguimos buscar as informações do produto...');document.location='produtos.php';</script>";
        }
        
    }

    public function carrinho($id_cliente, $id_produto, $qttd){
        $result = $this->produto->carrinho($id_cliente, $id_produto, $qttd);
        if($result > 0){
            return $result;
        }else if($result == 2){
            return $result;
        }else{
            echo "<script>alert('Você já possui este brinquedo no seu carrinho de compras!');document.location='produtos.php';</script>";
        }
        
    }

    private function contato(){
        $this->cliente->setNome($_POST['txtNome']);
        $this->cliente->setEmail($_POST['txtEmail']);
        $this->cliente->setAssunto($_POST['txtAssunto']);
        $this->cliente->setMensagem($_POST['txtMensagem']);
        $result = $this->cliente->contato();
        if($result >= 1){
            echo "<script>alert('Sua mensagem foi enviada com sucesso! Entraremos em contato pelo seu e-mail de 1 a 3 dias úteis!');document.location='../faleconosco.php'</script>";
        }else{
            echo "<script>alert('Erro ao enviar mensagem!');</script>";
        }
    }

    private function loginCliente($login, $password){
        $result = $this->banco->loginCliente($login, $password);
        if($result >= 1){
            echo "<script>document.location='../index.php';alert('Login Efetuado com sucesso!');</script>";
        }else{
            echo "<script>alert('E-mail e/ou senha incorretos! Tente Novamente!');document.location='../login.php'</script>";
        }
    }

    private function loginAdmin($login, $password){
        $result = $this->banco->loginAdmin($login, $password);
        if($result >= 1){
            echo "<script>alert('Login Efetuado com sucesso!');document.location='../index_gerente.php'</script>";
        }else{
            echo "<script>alert('E-mail e/ou senha incorretos! Tente Novamente!');document.location='../login_gerente.php'</script>";
        }
    }

    public function captar($id){
        return $result = $this->cliente->captar($id);
    }

    private function editar($id){
        $this->cliente->setId($id);
        $this->cliente->setNome($_POST['txtNome']);
        $this->cliente->setSobrenome($_POST['txtSobrenome']);
        $this->cliente->setEmail($_POST['txtEmail']);
        $this->cliente->setSenha($_POST['txtSenha']);
        $this->cliente->setEndereco($_POST['txtEndereco']);
        $this->cliente->setNum($_POST['txtNum']);
        $this->cliente->setBairro($_POST['txtBairro']);
        $this->cliente->setCep($_POST['txtCep']);
        $this->cliente->setCidade($_POST['txtCidade']);
        $this->cliente->setEstado($_POST['txtEstado']);
        $this->cliente->setPreferencia($_POST['cboCategorias']);
        $result = $this->cliente->editar();
        if($result >= 1){
            echo "<script>alert('Registro alterado com sucesso!');document.location='../editarinfo.php'</script>";
        }else{
            echo "<script>alert('Erro ao alterar o registro!');</script>";
        }
    }

    public function excluirCad(){
        $result = $this->cliente->excluirCad();
        if($result >= 1){
            echo "<script>alert('Registro excluido com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o registro!');document.location='../editarinfo.php'</script>";
        }
    }

    public function excluirProd($id){
        $result = $this->produto->excluirProd($id);
        if($result >= 1){
            echo "<script>alert('Produto excluido com sucesso!');document.location='../catalogo_editavel.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir o produto!');document.location='../catalogo_editavel.php'</script>";
        }
    }

}
new controller();
?>
