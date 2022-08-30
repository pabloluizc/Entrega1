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
        <h1>Alterar senha</h1>
            <form method="POST">
                <input type="email" name="email" placeholder="E-mail" >
                <input type="password" name="senha" placeholder="Senha">
                <input type="password" name="novSenha" placeholder="Nova senha">
                <input type="submit" value="ALTERAR">
                <a href="excluir.php">Deseja excluir sua conta? <strong>Clique aqui!</strong></a>
                <a href="AreaPrivada.php">Voltar</a>
            </form>
        </div>
<?php
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $novaSenha = addslashes($_POST['novSenha']);

        if(!empty($email) && !empty($senha) && !empty($novaSenha))
                {
                    $u->conectar("projeto_doa", "localhost", "root", "");
    
                    if($u->msgErro == "") //se esta tudo ok
                    {
                        if($senha != $novaSenha)
                        {                        
                            if($u->alterarDados($email, $senha, $novaSenha))
                            {
                                ?>
                                <div id="msg-sucesso">
                                Senha alterada com sucesso!
                                </div>
                                
                                <?php
                            }
                            else{
                                ?>
                                <div class="msg-erro">
                                    Senha não alterada. Verifique e-mail e senha digitados!
                                </div>
                                
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <div class="msg-erro">
                                Senha e nova senha são iguais!
                                </div>
                            <?php
                        }
                    }
                    else
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