<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;

    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
    
    
?>

<html lang ="pt-br">
    <head>
        <meta charset="utf-8"/>
        <title> Doa+ </title>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body>
        <div id="corpo-form">
        <h1>Perfil</h1>
                <?php
                    class Artigo
                    {
                        private $mysql;

                        public function exibirTodos(): array
                        {
                            $resultado = $this->mysql->query("SELECT * FROM usuarios");
                            $artigos = $resultado->fetch_all(MUSQLI_ASSOC);
                            return $artigos;
                        }
                    }
                    $tv = new Artigo;
                    $tv->exibirTodos();
                ?>
        </div>
    </body>
</html>