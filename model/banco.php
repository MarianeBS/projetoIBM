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

    public function setCadastro($nome,$sobrenome,$email,$senha,$endereco,$bairro,$cep,$cidade,$estado,$preferencia){
        $stmt = $this->mysqli->prepare("INSERT INTO tbl_cliente (`nome`,`sobrenome`, `email`, `senha`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `preferencia`) VALUES (?,?,?,?,?,?,?,?,?,?);");
        $stmt->bind_param("ssssssssss",$nome,$sobrenome,$email,$senha,$endereco,$bairro,$cep,$cidade,$estado,$preferencia);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

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

    public function getLogin($login, $password){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_cliente WHERE email = '" . $login . "' AND senha = '" . $password . "';");

            $total = mysqli_num_rows($stmt); 
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
                $f_lista[$i]['bairro'] = $l['bairro'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['estado'] = $l['estado'];
                $f_lista[$i]['preferencia'] = $l['preferencia'];
                $i++;
            }
            if( $total > 0){
                $cod = $f_lista[0]['id'];
                return $cod;
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
                $f_lista[$i]['bairro'] = $l['bairro'];
                $f_lista[$i]['cep'] = $l['cep'];
                $f_lista[$i]['cidade'] = $l['cidade'];
                $f_lista[$i]['estado'] = $l['estado'];
                $f_lista[$i]['preferencia'] = $l['preferencia'];
                $i++;
            }
            return $f_lista;
        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar buscar Todos." . $e;
        }
    }

    public function getItem($pesquisa){
        try {
            $stmt = $this->mysqli->query("SELECT * FROM tbl_produto WHERE nome LIKE '%" . $pesquisa . "%';");

            $total = mysqli_num_rows($stmt); 
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l) {
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['id_categoria'] = $l['id_categoria'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['preco'] = $l['preco'];
                $f_lista[$i]['img1'] = $l['img1'];
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

    public function updateCadastros($id,$nome,$email,$senha,$endereco,$bairro,$cep,$cidade,$estado){
        $stmt = $this->mysqli->query("UPDATE  tbl_cliente  SET `nome` = '" . $nome . "', `email` = '" . $email . "', `senha` = '" . $senha . "', `endereco` = '" . $endereco . "', `bairro` = '" . $bairro . "',`cep` = '" . $cep . "',`cidade` = '" . $cidade . "',`estado` = '" . $estado . "' WHERE `logins`.`id` = " . $id . ";");
        if( $stmt > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCadastros($id){
        $stmt = $this->mysqli->query("DELETE FROM tbl_cliente WHERE `id` =  '" . $id . "';");
        if( $stmt > 0){
            return true ;
        }else{
            return false;
        }
    }

}    
?>
