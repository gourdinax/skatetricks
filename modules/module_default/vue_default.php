<?php

	include_once './vue_generique.php';

	class VueDefault extends vueGenerique{

		function affichageIndex() {

			echo '
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<a href="http://localhost/projet-php/index.php?module=detail&id=Frontside%20and%20backside"> 
								<img  class="d-block w-100" src="./images/frontbackside.jpg" alt="Frontside backside">
								<div class="carousel-caption d-md-block">
									<h5>Frontside Backside</h5>
								</div>
							</a>
						</div>
					<div class="carousel-item">
						<a href="http://localhost/projet-php/index.php?module=detail&id=360%20flip%20%C3%A0%20la%20corto"> 
							<img class="d-block w-100" src="./images/360Flip.jpg" alt="360 flip">
							<div class="carousel-caption d-md-block">
									<h5>360 Flip</h5>
							</div>
						</a>
					</div>
					<div class="carousel-item">
						<a href="http://localhost/projet-php/index.php?module=detail&id=Shov%20it"> 
							<img class="d-block w-100" src="./images/shovit.jpg" alt="Shov It">
							<div class="carousel-caption d-md-block">
									<h5>Shov it</h5>
							</div>
						</a>
					</div>
					</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
				</div>
			';

		}

	}
?>