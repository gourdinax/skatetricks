$(document).ready( function() {
	$etat = $("#etat-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=gestion&action=liste&etat=' + $etat
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-25">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			$etat = '';
			$lien = '';
			( value.validation == 0 ? $etat += ' btn-danger"> Invalide' : $etat += ' btn-success"> Validé' );
			( value.validation == 0 ? $lien += 'valider' : $lien += 'plusvalider' );

			resultat += '<tr>' +
							'<td scope="col" class="w-25">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks + '" class="text-decoration-none">' + value.id_tricks + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
							'<td scope="col" class="text-center">' + 
								'<a href="./index.php?module=gestion&idTricks=' + value.id_tricks + '&action=' + $lien + '" class="btn-etat btn ' +
									$etat +
								'</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-tricks").find("tbody").html(resultat);
	});
});

$("#recherche-tricks").on('reset', function() {
	$etat = $("#etat-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=gestion&action=liste&etat=' + $etat
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-25">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			$etat = '';
			$lien = '';
			( value.validation == 0 ? $etat += ' btn-danger"> Invalide' : $etat += ' btn-success"> Validé' );
			( value.validation == 0 ? $lien += 'valider' : $lien += 'plusvalider' );

			resultat += '<tr>' +
							'<td scope="col" class="w-25">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks + '" class="text-decoration-none">' + value.id_tricks + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
							'<td scope="col" class="text-center">' + 
								'<a href="./index.php?module=gestion&idTricks=' + value.id_tricks + '&action=' + $lien + '" class="btn-etat btn ' +
									$etat +
								'</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-tricks").find("tbody").html(resultat);
	});
});

$("#recherche-tricks").on('submit', function(e) {
	e.preventDefault();
	$tricks = $("#recherche-input").val();	
	$user = $("#auteur-input").val();
	$etat = $("#etat-select").val();

	$.ajax({
		type: 'GET',
		url: 'api.php?module=gestion&action=liste&etat=' + $etat + '&user=' + $user + '&tricks=' + $tricks
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="w-25">' +
								'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col" class="w-25">' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			$etat = '';
			$lien = '';
			( value.validation == 0 ? $etat += ' btn-danger"> Invalide' : $etat += ' btn-success"> Validé' );
			( value.validation == 0 ? $lien += 'valider' : $lien += 'plusvalider' );

			resultat += '<tr>' +
							'<td scope="col" class="w-25">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks + '" class="text-decoration-none">' + value.id_tricks + '</a>' +
							'</td>' +
							'<td scope="col" class="w-25">' +
								value.auteur +
							'</td>' +
							'<td scope="col" class="text-center">' + 
								'<a href="./index.php?module=gestion&idTricks=' + value.id_tricks + '&action=' + $lien + '" class="btn-etat btn ' +
									$etat +
								'</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-tricks").find("tbody").html(resultat);
	});
});

$('tbody-result').on('click', '.btn-etat', function(e) {
	e.preventDefault();
});

$('#recherche-input').on('input', function() {
	$("#recherche-tricks").submit();
});

$('#auteur-input').on('input', function() {
	$("#recherche-tricks").submit();
});

$('#etat-select').on('change', function() {
	$("#recherche-tricks").submit();
});