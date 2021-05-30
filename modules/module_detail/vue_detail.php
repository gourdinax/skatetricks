<?php
	include_once './vue_generique.php';

	class VueDetail extends vueGenerique{

		function afficheBase($detail) {
		
			echo '
			<div class="container" >
				<div class=row justify-content-center" style="margin-top: 30px;">
				<div class="col-1">
				</div>
					<div class="col-10" style="border: #343a40 solid 2px; border-radius: 10px; padding-right: 30px; padding-left: 30px; padding-top: 20px; padding-bottom: 20px;">
						<div style="margin-bottom: 20px;" style="border-bottom: #343a40 solid 2px;">
							<h1 style="border-bottom: #343a40 solid 2px; padding-bottom : 20px;">'.$detail[0]['id_tricks'].'</h1>
						</div>
						<div style="margin-bottom: 30px;" >
							<p>'.$detail[0]['desc_tricks'].'</p>
						</div>
						<a href="./index.php?module=detail&id='.$detail[0]['id_tricks'].'&action=note" class="btn btn-info border mb-3">Je connais ce tricks</a>
						<a href="./index.php?module=forum&idTricks='.$detail[0]['id_tricks'].'" class="btn btn-warning border mb-3">Forum</a>
					</div>
				</div>			
			</div>';
		}
	}
?>

