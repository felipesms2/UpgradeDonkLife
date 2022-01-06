<!doctype html>
<html lang="en">
  <head>
  	<title>Donklife</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	

	</head>
	<body>

	<?php
        include "./vendor/autoload.php";
        include "./assets-bunch.php";
        include "./model-config.php";
        include "./control-class-System.php";
		include "./view-generic-modal.php";

        if (isset($_GET['mode'])) 
            {
              $mode = $_GET['mode'];   
            }
        else $mode = null;

		$system = new System();
		$system->defaultStartForm = $mode;

        // echo "<pre>" ,  var_dump($_SERVER["HTTP_HOST"]) , "</pre>";
        // echo "<pre>" ,  var_dump($_SESSION) , "</pre>";
        $displayDivMsg = "d-none";
        $msgDisplay  = "";
        if (isset($_SESSION['mainMsg'])) 
            {
                $msgDisplay = $_SESSION['mainMsg'];
                unset($_SESSION['mainMsg']);
                $displayDivMsg = "";
            }

    ?>


	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-2">
					<h2 class="heading-section"><img src="./img/donologo_intro.jpg"/> </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
								<div id="form-content">		
							  		<?=$system->setForm();?>
								</div>
							  <?php
                    if ($mode !="resetAuth") 
                    {
                        include "./view-adittional-login-info.php";
                    }  
            
        			?>
        				<script>
					
    
          			displayAdd("<?=$system->setAdditional()?>");
        			</script>
            			<div id="responseContainer" class="text-center error-validation">
            			</div>
						<div id="error-allMessage" class="alert alert-danger text-center font-weight-bold error-validation" style="display: none"></div>
							</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h3>Comunidade aberta a jogadores a todos os jogadores de poker!</h3>
									<p class="mb-4">Foco em jogos micro e lowstakes.</p>
				       
									<div class="dbox w-100 d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="fa fa-group"></span>
										</div>
										<div class="text pl-3">
										<p> Um fórum aberto na comunidade, para interação e compartilhamento de conhecimento e experiências de forma clara e, discussão de mãos, sanar dúvidas de poker, softwares, setups e afins.</p>
									  </div>
								  </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	

	<script>
	    
    var regionalCodeBR = <?=$system->jsonDisplayDOM("./ressources/ddd-list.json");?>;
    //regionalCodeBR = Object.values(regionalCodeBR);  /*Converting object to array*/
    let defaultOption = ["", "Selecione"];
    fillSelect("codeArea", regionalCodeBR, defaultOption);
    
  	</script>
	<input type="hidden" id='diVForDisplay' name='divForDisplay' value="">
	</body>
</html>

