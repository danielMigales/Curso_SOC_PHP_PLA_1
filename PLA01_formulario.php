<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: FORMULARI</h1>
		<form method="post" action="PLA01_mostrardatos.php">
			
			<!--he afegit un placeholder a tots els inputs perque mostrin el que s'ha d'escriure-->
			<label for='nif'>Nif</label>
			<input type="text" name="nif" id='nif' placeholder="00000000X"><br><br>
			<label for='nom'>Nom</label>
			<input type="text" name="nom" id='nom' placeholder="Daniel"><br><br>
			<label for='cognoms'>Cognoms</label>
			<input type="text" name="cognoms" id='cognoms' placeholder="Migales"><br><br>
			<label for='email'>Email</label>
			<input type="email" name="email" id='email' placeholder="daniel@gmail.com"><br><br>

			<!--Aqui he fet una petita trampa perque el input del number nomes funcioni del 0 al 10-->
			<label for='nota'>Nota exàmen</label>
			<input type="number" name="nota" id='nota' placeholder="numero 1 al 10" min="0" max="10"><br><br>

			<label for='missatge'>Missatge</label>
			<textarea name='missatge' id='missatge' cols='22' rows='5' placeholder="Comentari obligatori."></textarea><br><br>
			<label></label>
			<input type="submit" name="Enviar">
		</form>
	</div>
</body>

</html>