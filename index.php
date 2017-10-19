<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<title>Page magique</title>
	</head>
	<body>
		<div class="container">
			<div id="requete">
				<h2> Voici la page de lien vers la base de données</h2>
				<textarea rows=10 cols=100>Entrez votre requête ici</textarea><br/>
				<button class="btn">Valider</button>
			</div>

			<div id="resultat"></div>
		</div>
	</body>
</html>


<?php
	$adress = '13.81.201.112';
	$user = "DentegoRep";
	$pwd = "DentegoRep2017";
	$dbname = "dentegoreporting";

	$con = new mysqli($adress, $user, $pwd, $dbname);

	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	} 
	echo "Connected successfully";
	$result = $con->query('SELECT * FROM ref_centre');
	if (!$result) 
	{
	    die('Requête invalide : ' . mysql_error());
	}
	else 
	{
		echo "yes";
		echo $result->num_rows;
	}	

	$result->close();

?>