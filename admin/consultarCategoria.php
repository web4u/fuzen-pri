<?php
session_start();
require("../engine/bean/Usuario.php");
require("../engine/bean/Categoria.php");
?>
<!DOCTYPE HTML>
<html>
  <?php include("head.php");?>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">�rea Administrativa</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <?php
              $usuario = unserialize($_SESSION["usuario_sessao"]);
              echo($usuario->usuario); 
              ?>
            </p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include("menu.php");?>
        <?php
        if( isset($_SESSION["msg"]) && strlen($_SESSION["msg"]) > 0 ) { 
        ?>
	        <div class="span9">
	        	<div class="<?php echo($_SESSION["tipoMsg"]); ?>">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <h4>Aten��o!</h4>
				  <?php echo($_SESSION["msg"]); ?>
				</div>
	        </div>
        <?php } ?>
        <div class="span9">
          <div class="hero-unit">
            <h3>Consulta de Categoria</h3>
            
            <br />
            <br />
            
            <form class="form-signin" method="post" action="../engine/control/CategoriaCO.php">
				<input type="hidden" id="option" name="option" value="cadastrar" />
				<input type="hidden" id="oid" name="oid" value="0" />
				
				<table class="table">
				<?php 
				if( isset($_SESSION["listaCategoria"]) ) {
					$listaCategoria = $_SESSION["listaCategoria"];
					if( count($listaCategoria) > 0 ) {
						for($i = 0; $i < count($listaCategoria); $i++) {
							$categoria = unserialize($listaCategoria[$i]);
				?>
							<tr>
								<td>
									<?php echo($categoria->titulo);?>
								</td>
								<td>
									<?php 
									if($categoria->ativo == "t") {
										echo("SIM");
									}
									else {
										echo("N�O");
									}
									?>
								</td>
								<td>
									<button class="btn btn-large btn-primary" type="submit" onclick="AlteraValor(option, 'paginaAlterar');AlteraValor(oid, <?php echo($categoria->id);?>);">
										Alterar
									</button>
								</td>
								<td>
									<button class="btn btn-large btn-primary" type="submit" onclick="AlteraValor(option, 'remover');AlteraValor(oid, <?php echo($categoria->id);?>);">
										Remover
									</button>
								</td>
							</tr>
				<?php 
						}
					}
				}
				else {
					?>
					<tr>
						<td>Nenhum dado encontrado.</td>
					</tr>
					<?php 
				}
				?>
				</table>
				
			</form>
					
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../resources/bootstrap/js/jquery.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-transition.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-alert.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-modal.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-tab.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-popover.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-button.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="../resources/bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
