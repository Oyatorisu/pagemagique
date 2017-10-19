<?php
	$adress = '13.81.201.112';
	$user = "DentegoRep";
	$pwd = "DentegoRep2017";
	$dbname = "dentegoreporting";
	
	$req = $_POST["req"];
	$affichage = "";

	$con = new mysqli($adress, $user, $pwd, $dbname);

	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	} 
	echo "Connected successfully";
	$result = $con->query($req);
	if (!$result) 
	{
	    die('Requête invalide : ' . mysql_error());
	}
	else 
	{
		//faire une boucle sur les lignes du resultat de la requete avec mysqli_fetch_row
		//pour chaque ligne tu fait un mysqli_fetch_array qui va recupérer la ligne sous forme de tableau
		//ensuite concatener la chaine $affichage avec les colonnes du tableau en les séparant par des ;
	}	

	$result->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="UTF-8" />
		<title>Page magique</title>
	</head>
	<body>
		<div class="container">
			<form action="index.php" method="post">
				<div id="requete">
					<h2> Voici la page de lien vers la base de données</h2>
					<textarea rows=10 cols=100 id="req" name="req">Entrez votre requête ici</textarea><br/>
					<button class="btn" type="submit">Valider</button>
				</div>
			</form>
			

			<div id="resultat">
				<!-- afficher la variable affichage de php -->
			</div>
		</div>
	</body>
</html>