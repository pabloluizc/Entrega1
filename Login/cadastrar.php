<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>

<html lang ="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title> Doa+ </title>
        <link rel="stylesheet" href="CSS/estilo.css">
    </head>
    <body>
        <div id="corpo-form-Cad">
        <h1>Cadastrar</h1>
            <form method="POST">
                <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
                <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
                <input type="email" name="email" placeholder="E-mail" maxlength="40">
                <input type="password" name="senha" placeholder="Senha" maxlength="15">
                <input type="password" name="confSenha" placeholder="Confirmar senha">
                <input type="submit" value="Cadastrar">
                <a href="index.php">Voltar</a>
            </form>
        </div>

        <?php
            //verificar se clicou no botao
            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $confirmarSenha = addslashes($_POST['confSenha']);

                //verificar se esta preenchido
                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
                {
                    $u->conectar("projeto_doa", "localhost", "root", "");
                    if($u->msgErro == "") //se esta tudo ok
                    {
                        if($senha == $confirmarSenha)
                        {
                            if($u->cadastrar($nome, $telefone, $email, $senha))
                            {
                                ?>
                                <div id="msg-sucesso">
                                Cadastrado com sucesso! Acesse para entrar!
                                </div>
                                
                                <?php
                            }
                            else{
                                ?>
                                <div class="msg-erro">
                                    E-mail já cadastrado!
                                </div>
                                
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <div class="msg-erro">
                                Senha e confirmar senha não correspondem!
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