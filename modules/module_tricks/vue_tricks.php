<?php

	include_once './vue_generique.php';

	class VueTricks extends vueGenerique{

		function afficheBase($choix) {
			if($choix === 1) {
				echo 
					'		<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
			<div class="col-1">
			</div>

				<div class="col-md-10 m-3">
					<a href="./index.php?module=tricks" class="btn btn-light border mb-3">Tricks</a>
					<h3>Création d\'un tricks</h3>
					<p class="text-muted">Ici, vous pourrez créer votre propre tricks.</p>
				</div>
			</div> 
				';
			} else { 
				echo 
					'		<div class="container bg-white pb-5" style="height:1250px">
			<div class="row pt-5 pb-2">
			<div class="col-1">
			</div>
				<div class="col-md-10 ">
					<a href="./index.php?module=default" class="btn btn-light border mb-3">Accueil</a>
					<h3>Liste des tricks</h3>
					<p class="text-muted">Ici, vous avez la possibilité de pouvoir naviguer à travers la liste de tout les tricks disponibles.</p>
				</div>
			</div>
			<div class="row"> 
				<div class="col-1">
				</div>
			
				';
			}
		}

		function menu($droit) {
				echo '
				<div class="col-md-10 mb-3">
					<a href="./index.php?module=tricks&action=formAjoutTricks" class="btn btn-danger px-4 py-2" style="text-decoration: none; color: white">
						Ajouter un tricks
					</a>
				</div>
			</div>
			<div class="row justify-content-center mt-3">
				<div class="col-md-10">
					<form method="POST" id="recherche-tricks">
						<div class="input-group">
							<input type="text" name="disc" placeholder="Intitulé" class="form-control" id="input-tricks"/>
							<button type="reset" class="btn btn-outline-danger">⟳</button>
						</div>
					</form>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-10">
					<table class="table table-striped" id="table-result-tricks">
						<thead class="thead thead-dark">
							<tr>
								<th scope="col" class="pl-4 w-25">Intitulé</th>
								<th scope="col" class="w-75">Description</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<script src="./lib/js/tricks/recherche.js"></script>
	';

			
			
		}

		function formulaireAjoutTricks($token) {
			 echo '<div class="row pb-5">
			 <div class="col-1">
			 </div>

					<div class="col-md-10 ml-3 pb-5">
						<form action="./index.php?module=tricks&action=ajoutTricks" method="POST" id="form_ajout_tricks">
							<label for="id_tricks" class="d-block">Intitulé de la tricks</label>
							<input type="text" name="id_tricks" placeholder="Intitulé" class="mb-4 py-2 pl-2 w-50 form-control d-inline-block" required /><div class="obl ml-3 d-inline-block" style="color:red">*</div>
							<input type="hidden" value='.$token.' name="token" />
							<label for="desc_tricks" class="d-block">Description de la tricks</label>
							<textarea class="w-75 p-2 form-control d-inline-block" type="text" name="desc_tricks" placeholder="Description" rows="3" required ></textarea><div class="obl ml-3 mb-4 d-inline-block" style="color:red">*</div>
							<p class="mt-2"><span style="color:red">*</span> Champs obligatoires</p> 
							<button type="submit" class="btn btn-warning mt-2 px-4 d-block">Ajouter</button>
						</form>
					</div>
				</div>
			</div>
	';
		}
	}
?>

