<?php

//array que recull els errors
$errors = [];

//obtencio del camp nif amb excepcions que s'afegeixen al array de errors
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

//obtencio del camp email
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

//valoracio de la nota amb un switch. Tambe he probat amb un if else if. El resultat es igual.

switch ($nota) {
	case ($nota == 0):
		$qualificacio = 'Suspens';
		break;
	case ($nota > 0 && $nota < 5):
		$qualificacio = 'Suspens';
		break;
	case ($nota >= 5 && $nota <= 7):
		$qualificacio = 'Aprovat';
		break;
	case ($nota > 7 && $nota < 9):
		$qualificacio = 'Notable';
		break;
	case ($nota >= 9):
		$qualificacio = 'Excelent';
		break;
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
		
		<!--a cada input es coloca la informacio obtenida i validada-->
		<div class='card'>
			<input type="text" placeholder="nif" disabled value='<?php echo $nif ?>'><br><br>
			<input type="text" placeholder="nom" disabled value='<?php echo $nom ?>'>
			<input type="text" placeholder="cognoms" disabled value='<?php echo $cognoms ?>'><br><br>
			<input type="text" placeholder="qualificació" disabled value='<?php echo $qualificacio ?>'>

			<!--inclusio del aside amb php-->

			<?php

			//he creat un array amb tots els valors del aside. Despres amb un bucle depenent de la nota mostra les capsetes.
			$capsesAside = array(
				"<aside class='rojo'></aside>",
				"<aside class='rojo'></aside>",
				"<aside class='rojo'></aside>",
				"<aside class='rojo'></aside>",
				"<aside class='rojo'></aside>",
				"<aside class='amarillo'></aside>",
				"<aside class='amarillo'></aside>",
				"<aside class='verde'></aside>",
				"<aside class='verde'></aside>",
				"<aside class='azul'></aside>",
				"<aside class='azul'></aside>"
			);

			for ($i = 1; $i <= $nota; $i++) {
				echo $capsesAside[$i];
			}

			?>

			<br><br>
			<input type="text" placeholder="email" disabled value='<?php echo $email ?>'><br><br>
			<textarea cols='22' rows='5' placeholder="comentari" disabled><?php echo $missatge ?></textarea>
			<p class='errors'><?php foreach ($errors as $valor) {
									echo $valor . '<br/>';
								}  ?></p>
		</div>
	</div>
</body>

</html>