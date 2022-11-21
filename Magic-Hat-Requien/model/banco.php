<?php

//timezone

date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados

define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','magic_db');
    
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setCompra(){
        $data = date('Y-m-d');
        session_start();
        $cod = $_SESSION['id_cliente'];
        $qtdd_total = $_SESSION['qtdd_total'];
        $valor_total = $_SESSION['valor_total'];

        $stmt1 = $this->mysqli->prepare("INSERT INTO tbl_compras (`id_cliente`, `data_compra`, `quant`, `valor_total`) VALUES (?,?,?,?);");
        $stmt1->bind_param("ssss",$cod,$data,$qtdd_total,$valor_total);

        $carrinho = $this->getCarrinho($cod, 0, 1);

        for ($i = 0; $i < count($carrinho); $i++) {
            $new_qtdd = $carrinho[$i]['quant_index'] - $carrinho[$i]['quant'];
            $stmt = $this->mysqli->query("UPDATE  tbl_produto  SET `quant` = '" . $new_qtdd . "' WHERE `tbl_produto`.`id` = " . $carrinho[$i]['id_produto'] . ";");
        }

        $stmt = $this->mysqli->query("DELETE FROM tbl_carrinho WHERE `id_cliente` =  '" . $cod . "';");

        if( $stmt1->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
        

    }

    public function setCadastro($nome,$sobrenome,$email,$senha,$endereco,$num,$bairro,$cep,$cidade,$estado,$preferencia){
        $stmt = $this->mysqli->prepare("INSERT INTO tbl_cliente (`nome`,`sobrenome`, `email`, `senha`, `endereco`,`numero`, `bairro`, `cep`, `cidade`, `estado`, `preferencia`) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssssssss",$nome,$sobrenome,$email,$senha,$endereco,$num,$bairro,$cep,$cidade,$estado,$preferencia);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function setProduto($nomeProd,$categoriaProd,$tipo1,$tipo2,$faixaProd,$quantProd,$marcaProd,$valorProd,$materialProd,$descProd){
        $img = $this->retornaImg();
        $img1 = "img/produtos/" . $img['img1'];
        $img2 = "img/produtos/" . $img['img2'];
        $img3 = "img/produtos/" . $img['img3'];

        $stmt = $this->mysqli->prepare("INSERT INTO tbl_produto (`categoria`,`nome`, `tipo1`, `tipo2`, `faixa_etaria`, `quant`, `preco`, `marca`, `material`, `descricao`, `img1`, `img2`, `img3`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("sssssssssssss",$categoriaProd,$nomeProd,$tipo1,$tipo2,$faixaProd,$quantProd,$valorProd,$marcaProd,$materialProd,$descProd,$img1,$img2,$img3);
        
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function updateProduto($id_prod,$nomeProd,$categoriaProd,$tipo1,$tipo2,$faixaProd,$quantProd,$marcaProd,$valorProd,$materialProd,$descProd){
        $stmt = $this->mysqli->query("UPDATE  tbl_produto  SET `categoria` = '" . $categoriaProd . "', `nome` = '" . $nomeProd . "', `tipo1` = '" . $tipo1 . "', `tipo2` = '" . $tipo2 . "', `faixa_etaria` = '" . $faixaProd . "', `quant` = '" . $quantProd . "', `preco` = '" . $valorProd . "',`marca` = '" . $marcaProd . "',`material` = '" . $materialProd . "',`descricao` = '" . $descProd . "' WHERE `tbl_produto`.`id` = " . $id_prod . ";");
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    public function retornaImg(){
        $stmt = $this->mysqli->query("SELECT * FROM tbl_produto;");
        $registros = mysqli_num_rows($stmt); 
        $registros = $registros * 3;
        $img = array();

        $img['img1'] = $registros + 1 . ".jpg";
        $img['img2'] = $registros + 2 . ".jpg";
        $img['img3'] = $registros + 3 . ".jpg";

        return $img;
    }

    public function setContato($nome,$email,$assunto,$mensagem){
        $stmt = $this->mysqli->prepare("INSERT INTO tbl_contato (`nome_contato`, `email_contato`, `assunto`, `mensagem`) VALUES (?,?,?,?);");
        $stmt->bind_param("ssss",$nome,$email,$assunto,$mensagem);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function loginCliente($login, $password){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_cliente WHERE email = '" . $login . "' AND senha = '" . $password . "';");

            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $id_cliente;
            $i = 0;
            
            foreach ($lista as $l) {
                $id_cliente = $l['id'];
            }

            if( $total > 0){
                session_start();
                $_SESSION['id_cliente'] = $id_cliente;
                return $id_cliente;
            }else{
                return 0;
            }
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar seu login!" . $e;
        }
    }

    public function loginAdmin($login, $password){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_admin WHERE user = '" . $login . "' AND senha = '" . $password . "';");

            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $id_admin;
            
            foreach ($lista as $l) {
                $id_admin = $l['id'];
            }

            if( $total > 0){
                session_start();
                $_SESSION['id_admin'] = $id_admin;
                return $id_admin;
            }else{
                return 0;
            }
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar seu login!" . $e;
        }
    }

    public function getAdmin($id){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_admin WHERE id = '" . $id . "';");

            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $admin = array();
            
            foreach ($lista as $l) {
                $admin['id'] = $l['id'];
                $admin['nome'] = $l['nome'];
            }

            if( $total > 0){
                return $admin;
            }else{
                return 0;
            }
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar seu login!" . $e;
        }
    }

    public function getCliente($id){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_cliente WHERE id = '" . $id . "';");

            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;

            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['sobrenome'] = $l['sobrenome'];
                $f_lista[$i]['email'] = $l['email'];
                $f_lista[$i]['senha'] = $l['senha'];
                $f_lista[$i]['endereco'] = $l['endereco'];
                $f_lista[$i]['numero'] = $l['numero'];
                $f_lista[$i]['bairro'] = $l['bairro'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['estado'] = $l['estado'];
                $f_lista[$i]['preferencia'] = $l['preferencia'];
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar Todos." . $e;
        }
    }

    public function getProd($id_prod){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_produto WHERE id ='" . $id_prod . "';");
            
            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['categoria'] = $l['categoria'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['tipo1'] = $l['tipo1'];
                $f_lista[$i]['tipo2'] = $l['tipo2'];
                $f_lista[$i]['faixa'] = $l['faixa_etaria'];
                $f_lista[$i]['preco'] = $l['preco'];
                $f_lista[$i]['marca'] = $l['marca'];
                $f_lista[$i]['material'] = $l['material'];
                $f_lista[$i]['quant'] = $l['quant'];
                $f_lista[$i]['descricao'] = $l['descricao'];
                $f_lista[$i]['img1'] = $l['img1'];
                $f_lista[$i]['img2'] = $l['img2'];
                $f_lista[$i]['img3'] = $l['img3'];
            }

            if($total >= 1){
                return $f_lista;
            }else{
                return 0;
            }

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar o pruduto!" . $e;
        }
    }

    public function getItem($pesquisa, $var){
        try {
            if($var == 0){
                $stmt = $this->mysqli->query("SELECT * FROM tbl_produto;");
            }else{
                $stmt = $this->mysqli->query("SELECT * FROM tbl_produto WHERE nome LIKE '%" . $pesquisa . "%';");
            }
            

            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['categoria'] = $l['categoria'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['tipo1'] = $l['tipo1'];
                $f_lista[$i]['tipo2'] = $l['tipo2'];
                $f_lista[$i]['faixa'] = $l['faixa_etaria'];
                $f_lista[$i]['preco'] = $l['preco'];
                $f_lista[$i]['marca'] = $l['marca'];
                $f_lista[$i]['material'] = $l['material'];
                $f_lista[$i]['quant'] = $l['quant'];
                $f_lista[$i]['descricao'] = $l['descricao'];
                $f_lista[$i]['img1'] = $l['img1'];
                $f_lista[$i]['img2'] = $l['img2'];
                $f_lista[$i]['img3'] = $l['img3'];
                $i++;
            }

            if($total >= 1){
                return $f_lista;
            }else{
                return 0;
            }

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar o pruduto!" . $e;
        }
    }

    public function updateCarrinho($id_cliente, $id_produto, $qtdd){
        $stmt = $this->mysqli->query("UPDATE  tbl_carrinho  SET `quant` = '" . $qtdd . "' WHERE `id_cliente` ='" . $id_cliente . "' AND `id_produto` = '" . $id_produto . "';");
    }

    public function getCarrinho($id_cliente, $id_produto, $qttd){
        try {
            if($qttd == 0){
                $stmt = $this->mysqli->query("DELETE FROM tbl_carrinho WHERE `id_cliente` =  '" . $id_cliente . "' AND `id_produto` = '" . $id_produto . "';");
                if( $stmt > 0){
                    return true ;
                }else{
                    return false;
                }
            }else{
                if($id_produto != 0){
                    $stmt = $this->mysqli->query("SELECT * FROM tbl_carrinho WHERE `id_cliente` ='" . $id_cliente . "' AND `id_produto` = '" . $id_produto . "';");
                    $repeat = mysqli_num_rows($stmt); 

                    if($repeat > 0){
                        return false;
                    }else{
                        $stmt = $this->mysqli->prepare("INSERT INTO tbl_carrinho (`id_cliente`,`id_produto`, `quant`) VALUES (?,?,?);");
                        $stmt->bind_param("sss",$id_cliente,$id_produto,$qttd);
                    
                        if( $stmt->execute() == TRUE){
                            return true ;
                        }else{
                            return false;
                        }
                    }

                    
    
                }else{
                    $stmt = $this->mysqli->query("SELECT * FROM tbl_carrinho WHERE id_cliente =" . $id_cliente . ";");
                
                    $total = mysqli_num_rows($stmt); 
                    $lista = $stmt->fetch_all(MYSQLI_ASSOC);
                    $carrinho = array();
                    $i = 0;
                    foreach ($lista as $l) {
                        $carrinho[$i]['id_produto'] = $l['id_produto'];
                        $carrinho[$i]['quant'] = $l['quant'];
                        $i++;
                    }
    
                    for($ii=0; $ii < count($carrinho); $ii++){
                        $stmt = $this->mysqli->query("SELECT * FROM tbl_produto WHERE id =" . $carrinho[$ii]['id_produto'] . ";");
                        $lista = $stmt->fetch_all(MYSQLI_ASSOC);
                        foreach ($lista as $l) {
                            $carrinho[$ii]['produto'] = $l['nome'];
                            $carrinho[$ii]['preco'] = $l['preco'];
                            $carrinho[$ii]['img'] = $l['img1'];
                            $carrinho[$ii]['quant_index'] = $l['quant'];
                        }
                    }
    
                    if($total >= 1){
                        return $carrinho;
                    }else{
                        return 2;
                    }
                }
            }
            
            

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar o pruduto!" . $e;
        }
    }

    public function updateCliente($id,$nome,$sobrenome,$email,$senha,$endereco,$num,$bairro,$cep,$cidade,$estado,$preferencia){
        $stmt = $this->mysqli->query("UPDATE  tbl_cliente  SET `nome` = '" . $nome . "', `sobrenome` = '" . $sobrenome . "', `email` = '" . $email . "', `senha` = '" . $senha . "', `endereco` = '" . $endereco . "', `numero` = '" . $num . "', `bairro` = '" . $bairro . "',`cep` = '" . $cep . "',`cidade` = '" . $cidade . "',`estado` = '" . $estado . "', `preferencia` = '" . $preferencia . "' WHERE `tbl_cliente`.`id` = " . $id . ";");
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCadastro(){
        session_start();
        $cod = $_SESSION['id_cliente'];
        $stmt = $this->mysqli->query("DELETE FROM tbl_cliente WHERE `id` =  '" . $cod . "';");

        if( $stmt > 0){
            session_destroy();
            return true;
        }else{
            return false;
        }
    }

    public function deleteProd($id){
        $stmt = $this->mysqli->query("DELETE FROM tbl_produto WHERE `id` =  '" . $id . "';");

        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }



}    
?>
