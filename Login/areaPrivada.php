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

<!--
<a href="Sair.php"> Sair </a>
<a href="Editar.php?email=<?php //echo "string" ?>"> Editar senha </a>
-->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </head>
  <body>
				<!-- Barra de navegação -->
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
				  <a class="navbar-brand" href="#">Doa+</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
					<span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item active">
						<a class="nav-link" href="#">Início <span class="sr-only">(página atual)</span></a>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Produtos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="#">Camisas</a>
						  <a class="dropdown-item" href="#">Calcas</a>
						</div>
					  </li>
                      <li class="nav-item active">
						<a class="nav-link" href="Sair.php">Sair <span class="sr-only">(página atual)</span></a>
					  </li>
                      <li class="nav-item active">
						<a class="nav-link" href="Editar.php">Alterar senha <span class="sr-only">(página atual)</span></a>
					  </li>
                      <li class="nav-item active">
						<a class="nav-link" href="perfil.php">Perfil<span class="sr-only">(página atual)</span></a>
					  </li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
					  <input class="form-control mr-sm-2" type="search" placeholder="Digite aqui" aria-label="Pesquisar">
					  <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Pesquisar</button>
					</form>
				  </div>
				</nav>
				
					<!-- Carousel -->
          <div class="container">
  <div class="row">
    <div class="col-sm">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="camisa1.jpeg" alt="Primeiro Slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="camisa2.jpeg" alt="Segundo Slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="camisa3.jpeg" alt="Terceiro Slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Próximo</span>
                        </a>
                      </div>
    </div>
    <div class="col-sm">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="calca1.jpeg" alt="Modelo papel de parede">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="calca2.jpeg" alt="Segundo Slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="calca3.jpeg" alt="Terceiro Slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Próximo</span>
                        </a>
            </div>
    </div>
  </div>
</div>
					  <div class="modal-footer">
					  
                        <!-- Botão para acionar modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">Entre em contato conosco</button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"> 
                                <h5 class="modal-title" id="exampleModalLabel">Formulário para contato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form>
									<div class="form-row align-items-center">
										<div class="col-auto">
										  <label class="sr-only" for="inlineFormInput">Nome</label>
										  <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Nome">
										</div>
                                          <div class="col-auto">
											<label class="sr-only" for="inlineFormInput">Sobrenome</label>
											<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Sobrenome">
										  </div>
										   <div class="col-auto">
										  <label class="sr-only" for="inlineFormInputGroup">Usuário</label>
										  <div class="input-group mb-2">
											<div class="input-group-prepend">
											  <div class="input-group-text">@</div>
											</div>
											<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Usuário">
										  </div>
										</div>
										<div class="col-auto">
										  <label class="sr-only" for="inlineFormInput">Estado</label>
										  <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Estado">
										</div>
										<div class="input-group">
										  <div class="input-group-prepend">
										  </div>
										  <textarea class="form-control" aria-label="Com textarea" placeholder="Digite o que você falar conosco!"></textarea>
										</div>
                                        <div class="form-group">
                                          <div class="form-check">
                                            <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>

                                            <label>
                                              Concordo com os termos e condições
                                            </label>
                                          </div>
                                        </div>
                                      </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Enviar mensagem</button>
                                </div>
                            </div>
                            </div>
                        </div>
					</div>
          
            
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
