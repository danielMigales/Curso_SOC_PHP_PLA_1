<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estils.css">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: FORMULARI</h1>
		<form method="post" action="PLA01_mostrardatos.php">
			<label for='nif'>Nif</label>
			<input type="text" name="nif" id='nif'><br><br>
			<label for='nom'>Nom</label>
			<input type="text" name="nom" id='nom'><br><br>
			<label for='cognoms'>Cognoms</label>
			<input type="text" name="cognoms" id='cognoms'><br><br>
			<label for='email'>Email</label>
			<input type="email" name="email" id='email'><br><br>
			<label for='nota'>Nota exàmen</label>
			<input type="number" name="nota" id='nota'><br><br>

			<label for='missatge'>Missatge</label>
			<textarea name='missatge' id='missatge' cols='22' rows='5'></textarea><br><br>
			<label></label>
			<input type="submit" name="Enviar">
		</form>
	</div>
</body>

</html>