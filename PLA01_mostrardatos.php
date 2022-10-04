<?php

//array de errors
$errors = [];

//obtencio del camp nif
if (!$nif = filter_input(INPUT_POST, 'nif')) {
	$errors[] = 'Nif obligatori';
}

//obtencio del camp nom
if (!$nom = filter_input(INPUT_POST, 'nom')) {
	$errors[] = 'Nom obligatori';
}

//obtencio del camp cognoms
if (!$cognoms = filter_input(INPUT_POST, 'cognoms')) {
	$errors[] = 'Cognom obligatori';
}

//obtencio del camp nota
if (($nota = filter_input(INPUT_POST, 'nota', FILTER_VALIDATE_INT)) === false) {
	$errors[] = 'Nota obligatoria o no numerica';
}

//FALTA VALIDAR QUE CUANDO NO HAYA NADA NO SEA 0
//valoracio de la nota

/*
if ($nota < 5) {
	$nota = 'Suspens';
} else if ($nota >= 5 && $nota < 7) {
	$nota = 'Aprovat';
} else if ($nota >= 7 && $nota <= 9) {
	$nota = 'Notable';
} else if ($nota > 9) {
	$nota = 'Excelent';
}
*/

switch ($nota) {
	case 0:
		$nota;//quan no es posa res deixa el input amb el placeholder
		break;
	case ($nota < 5):
		$nota = 'Suspens';
		break;
	case ($nota >= 5 && $nota < 7):
		$nota = 'Aprovat';
		break;
	case ($nota >= 7 && $nota <= 9):
		$nota = 'Notable';
		break;
	case ($nota > 9):
		$nota = 'Excelent';
		break;
	default:
		$nota = 'No definida';
}

//obtencio del camp email
if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
	$errors[] = 'Email obligatori';
}

//obtencio del camp missatge
if (!$missatge = filter_input(INPUT_POST, 'missatge')) {
	$errors[] = 'Missatge obligatori';
}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estils.css?v=1.0">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: MOSTRAR DADES</h1>
		<div class='card'>
			<input type="text" placeholder="nif" disabled value='<?php echo $nif ?>'><br><br>
			<input type="text" placeholder="nom" disabled value='<?php echo $nom ?>'>
			<input type="text" placeholder="cognoms" disabled value='<?php echo $cognoms ?>'><br><br>
			<input type="text" placeholder="qualificació" disabled value='<?php echo $nota ?>'>
			<aside class='rojo'></aside>
			<aside class='amarillo'></aside>
			<aside class='verde'></aside>
			<aside class='azul'></aside>
			<br><br>
			<input type="text" placeholder="email" disabled value='<?php echo $email ?>'><br><br>
			<textarea cols='22' rows='5' disabled><?php echo $missatge ?></textarea>
			<p class='errors'><?php foreach ($errors as $valor) {
									echo $valor . '<br/>';
								}  ?></p>
		</div>
	</div>
</body>

</html>