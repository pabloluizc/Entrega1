<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;

    /*session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }*/
?>

<html lang ="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title> Doa+ </title>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body>
        <div id="corpo-form">
        <h1>Excluir conta</h1>
            <form method="POST">
                <input type="email" name="email" placeholder="E-mail" >
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="Excluir">
                <a href="AreaPrivada.php">Não deseja excluir sua conta? <strong>Clique aqui!</strong></a>
            </form>
        </div>
<?php
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        //verificar se esta preenchido
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("projeto_doa", "localhost", "root", "");
            if($u->msgErro == "")
            {
                if($u->excluirConta($email, $senha))
                {
                    ?>
                        <div id="msg-sucesso">
                            Conta excluída com sucesso!
                            <?php header("location: index.php"); ?>
                        </div>  
                    <?php
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                           Email e/ou senha estão incorretos!
                        </div>
                    <?php
                }
            }else
            {
                ?>
                    <div>
                        <?php echo "Erro: ".$u->msgErro;?>
                    </div>
                <?php
            }
        }else
        {
            ?>
                <div class="msg-erro">
                    Preencha todos os campos!
                </div>
            <?php
        }
    }
?>

    </body>
</html>