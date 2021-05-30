$(document).ready( function() {
	$.ajax({
		type: 'GET',
		url: 'api.php?module=tricks&action=liste'
	}).done( function(data) {
		var resultat = '';
		console.log(data);	
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="pl-4">' +
									'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		} 
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="pl-4">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks + '">' + value.id_tricks  + '</a>' +
							'</td>' +
							'<td scope="col">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks  + '">' + String(value.desc_tricks).substr(0, 100) + "..." 
								+ '</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-tricks").find("tbody").html(resultat);
	});
});

$("#recherche-tricks").on('reset', function() {
	$.ajax({
		type: 'GET',
		url: 'api.php?module=tricks&action=liste'
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="pl-4">' +
									'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="pl-4">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks  + '">' + value.id_tricks + '</a>' +
							'</td>' +
							'<td scope="col">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks  + '">' + String(value.desc_tricks).substr(0, 100)+ "..." + '</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-tricks").find("tbody").html(resultat);
	});
});

$("#recherche-tricks").on('submit', function(e) {
	e.preventDefault();
	$disc = $("#input-tricks").val();
	$.ajax({
		type: 'GET',
		url: 'api.php?module=tricks&action=liste&tricks=' + $disc
	}).done( function(data) {
		var resultat = '';
		if( data == '' ) {
			resultat = '<tr>' +
							'<td scope="col" class="pl-4">' +
									'Aucun résultat trouvé...' +
							'</td>' +
							'<td scope="col">' +
							'</td>' +
						'</tr>';
		}
		$.each(data, function(index, value) {
			resultat += '<tr>' +
							'<td scope="col" class="pl-4">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks + '">' + value.id_tricks + '</a>' +
							'</td>' +
							'<td scope="col">' +
								'<a href="./index.php?module=detail&id=' + value.id_tricks  + '">' + String(value.desc_tricks).substr(0, 100)+ "..." + '</a>' +
							'</td>' +
						'</tr>';
		});
		$("#table-result-tricks").find("tbody").html(resultat);
	});
});

$('#recherche-tricks').on('input', function() {
	$("#recherche-tricks").submit();
});