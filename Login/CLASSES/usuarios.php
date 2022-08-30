<?php

Class Usuario
{
    public $pdo;
    public $msgErro = ""; //se estiver vazia esta ok (não pegou erro no try catch)
    private $mysql;

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;

        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
           $msgErro = $e->getMessage();
        }
    }

    public function _construct(mysqli $mysql){
        $this->mysql = $mysql;
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        //verificar se ja existe email cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //ja esta cadastrada
        }
        else
        {
            //caso nao, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true; //cadastrado com sucesso
        }
        
    }

    public function logar($email , $senha)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        
        if($sql->rowCount() > 0)
        {
            //se estiver cadastrada entra no sistema
            session_start();
            $dado = $sql->fetch();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso
        }
        else
        {
            return false; //nao foi possivel logar
        }
    }

    public function alterarDados($email, $senha, $novaSenha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        
        if($sql->rowCount() > 0)
        {
            //se estiver cadastrada entra no sistema
            session_start();
            $dado = $sql->fetch();
            $_SESSION['id_usuario'] = $dado['id_usuario'];

            $sql = $pdo->prepare("UPDATE usuarios SET senha = :ns WHERE email = :e");
            $sql->bindValue(":e",$email);
            //$sql->bindValue(":s",md5($senha));
            $sql->bindValue(":ns",$novaSenha);

            $sql->execute();
            return true; //cadastrado com sucesso
        }
        else
        {
            return false; 
        }
    }

    public function excluirConta($email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        
        if($sql->rowCount() > 0)
        {
            //se estiver cadastrada entra no sistema
            session_start();
            $dado = $sql->fetch();
            $_SESSION['id_usuario'] = $dado['id_usuario'];

            $sql = $pdo->prepare("DELETE FROM usuarios WHERE email = :e");
            $sql->bindValue(":e",$email);
            //$sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //cadastrado com sucesso
        }
        else
        {
            return false; 
        }
    }

    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM usuarios ORDER BY nome");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC); 
        IF($res != "")
        {
            return $res;
        }
        else
        {
            return false;
        }
        
    }

}

?>