<?php

//array que recull els errors
$errors = [];

//obtencio del camp nif
try {
	if (!$nif = filter_input(INPUT_POST, 'nif')) {
		throw new Exception('Nif obligatori');
	}
} catch (Exception $e) {
	$errors[] = $e->getMessage();
}

//obtencio del camp nom
try {
	if (!$nom = filter_input(INPUT_POST, 'nom')) {
		throw new Exception('Nom obligatori');
	}
} catch (Exception $e) {
	$errors[] = $e->getMessage();
}

//obtencio del camp cognoms
try {
	if (!$cognoms = filter_input(INPUT_POST, 'cognoms')) {
		throw new Exception('Cognom obligatori');
	}
} catch (Exception $e) {
	$errors[] = $e->getMessage();
}

//obtencio del camp nota
try {
	if (($nota = filter_input(INPUT_POST, 'nota', FILTER_VALIDATE_INT)) === false) {
		throw new Exception('Nota obligatoria o no numerica');
	}
} catch (Exception $e) {
	$errors[] = $e->getMessage();
}

//obtencio del camp email VALIDAR QUE SEA FORMATO CORRECTO
try {
	if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
		throw new Exception('Email obligatori');
	}
} catch (Exception $e) {
	$errors[] = $e->getMessage();
}

//obtencio del camp missatge
try {
	if (!$missatge = filter_input(INPUT_POST, 'missatge')) {
		throw new Exception('Missatge obligatori');
	}
} catch (Exception $e) {
	$errors[] = $e->getMessage();
}


//valoracio de la nota
//primer he fet servir un if else if i despres he probat amb un switch. Els dos funcionen igual.

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
		$nota; //quan no es posa res deixa el input amb el placeholder
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

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css?v=1.0">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: MOSTRAR DADES</h1>
		<div class='card'>
			<input type="text" placeholder="nif" disabled value='<?php echo $nif ?>'><br><br>
			<input type="text" placeholder="nom" disabled value='<?php echo $nom ?>'>
			<input type="text" placeholder="cognoms" disabled value='<?php echo $cognoms ?>'><br><br>
			<input type="text" placeholder="qualificació" disabled value='<?php echo $nota ?>'>

			<!--inclusio del aside-->
			
			<?php

			$nota = $_POST['nota']; //aqui torno a agafar el valor del POST perque la variable ara es un text
			for ($i = 0; $i <  $nota; $i++) {
				echo "<aside class='rojo'></aside>";
				if ($nota > 10) {
					break;
				}
			}

			?>

			<br><br>
			<input type="text" placeholder="email" disabled value='<?php echo $email ?>'><br><br>
			<textarea cols='22' rows='5' placeholder= "comentari" disabled><?php echo $missatge ?></textarea>
			<p class='errors'><?php foreach ($errors as $valor) {
									echo $valor . '<br/>';
								}  ?></p>
		</div>
	</div>
</body>

</html>