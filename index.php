<?php
	define( '_NOEXEC', true);
	session_start();

	include_once './Connexion.php';

	Connexion::initConnexion();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Skate Tricks</title>
		<link rel="icon" type="image/x-icon" href="images/logoSkateIcon.ico">
		<link rel="stylesheet" href="lib/bootstrap-4.3.1-dist/css/bootstrap.min.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>	
		<script src="lib/jquery/jquery-3.4.1.min.js" ></script>
		<script src="lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	</head>
	<body class="m-auto">
		<!-- NAV -->
		<header class="sticky-top">
			<!-- HIDDEN NAV -->
			<div class="collapse bg-dark align-items-center" id="navbarHeader">
				<div class="container">
					<div class="row align-items-start pt-3" id="nav-modules">
						<?php
							include_once 'modules/module_navigation/mod_navigation.php';
							$moduleObj = new ModNavigation();
						?>
					</div>
				</div>
			</div>
			<!-- TOP BAR NAV -->
			<div class="navbar navbar-dark bg-dark shadow">
				<div class="container d-flex justify-content-between">
					<a href="index.php" class="text-white text-decoration-none">
						<img src ="images/logoSkate.png" alt="logo SkateTricks" style="width:5em" class="mr-3"/>
						Le dico des figures de skate
					</a>
					<button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
						<!--<span class="navbar-toggler-icon"></span>--><span>Menu</span>
					</button>
				</div>
			</div>
		</header>
			<?php

				if ( isset($_GET['module']) ) {
					$module = $_GET['module'];
				} else {
					$module = 'default';
				}
				
				switch ($module) {

					case "tricks":
						include_once 'modules/module_tricks/mod_tricks.php';
						$moduleObj = new ModTricks();
						break;

					case "classement":
							include_once 'modules/module_classement/mod_classement.php';
							$moduleObj = new ModClassement();
							break;
	
					case "detail":
						include_once 'modules/module_detail/mod_detail.php';
						$moduleObj = new ModDetail();
						break;

					case "connexion":
						include_once 'modules/module_connexion/mod_connexion.php';
						$moduleObj = new ModConnexion();
						break;   

					case "utilisateur":
						include_once 'modules/module_utilisateur/mod_utilisateur.php';
						$moduleObj = new ModUtilisateur();
						break; 

					case "forum":
						include_once 'modules/module_forum/mod_forum.php';
						$moduleObj = new ModForum();
						break;

					case "gestion":
						include_once 'modules/module_gestion/mod_gestion.php';
						$moduleObj = new ModGestion();
						break;
				
					case "default":
						include_once 'modules/module_default/mod_default.php';
						$moduleObj = new ModDefault();
						break;
				}

				$aff = $moduleObj->controleur->vue->getAffichage();
				$vueGenerique = new vueGenerique();
				echo $aff;
		?>
		<!--
		<footer>
			<div class="container">
				<div class="content">
					<div class="row text-justify">
						<div class="col-md-12 mt-4">
							<p class="text-center font-italic"> Site conçu par Axel Gourdin </p>
							<p class="text-center font-italic" style="font-size: 12px">Aide ou suggestion, contact par mail à l'adresse suivante : <a href="mailto:aide-SkateTricks[at]support-SkateTricks.fr">aide-SkateTricks@support-SkateTricks.fr</a></p>
						</div>
					</div>
					</div>
					<hr class="col-12" style="background-color: white">
					<div class="row">
						<div class="col-md-12 text-center mb-4">
							Copyright <script>
							document.write(new Date().getFullYear())
							</script> SkateTricks All Rights Reserved.
						</div>
					</div>
				</div>
			</div>
		</footer>
	-->	
	</body>
</html>