<?php
	$adress = '13.81.201.112';
	$user = "DentegoRep";
	$pwd = "DentegoRep2017";
	$dbname = "dentegoreporting";
	$error ="";
	
	if (isset($_POST["req"]) == FALSE)
	{
		$req = "";
		$text = "<textarea rows=10 cols=100 id='req' name='req'>Entrez votre requête ici</textarea><br/>";
	}
	else {
		$req = $_POST["req"];
		$text = "<textarea rows=10 cols=100 id='req'' name='req''>";
		$text .= $req;
		$text .= "</textarea><br/>";
	}
	
	$affichage = "<table class='table-striped table-bordered table'>";

	$con = new mysqli($adress, $user, $pwd, $dbname);

	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	} 
	//echo "Connected successfully <br>";
	if ($req != "")
	{
		$result = $con->query($req);
		if (!$result) 
		{
			$error = mysqli_error($con);
			mysqli_close($con);
		    //die('Requête invalide : ' . mysql_error());
		}
		else 
		{
			$count = 1;
			while ($row = mysqli_fetch_assoc($result))
			{
				$affichage .= "<tr>";
				$affichage .= "<td>";
				$affichage .= $count;
				$count++;
				foreach ($row as $key => $value) {
					$affichage .= "<td>";
					$affichage .= $value;
				}
				$affichage .= "</tr>";
			}
			$affichage .= "</table>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<!--<link rel="stylesheet" href="style.css">-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="UTF-8" />
		<title>Page magique</title>
	</head>
	<body>
		<div class="container">
			<form action="index.php" method="post">
				<div id="requete">
					<h2> Voici la page de lien vers la base de données</h2>
					<!--<textarea rows=10 cols=100 id="req" name="req">Entrez votre requête ici</textarea><br/>-->
					<?php
					echo $text;
					?>
					<button class="btn" type="submit">Valider</button>
				</div>
			</form>
			

			<div id="resultat">
				<!-- afficher la variable affichage de php -->
				<?php 
				if ($error != "")
				{
					echo $error;
				}
				else
				{
					echo $affichage;
				}
			
				?>
			</div>
		</div>
	</body>
</html>