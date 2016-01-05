<?php 
	// checker la soumission du formulaire
	if (isset($_POST['action'])) {
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";

		// faire un echo de la taille du fichier envoyé
		echo 'Le poids du fichier est : ' . $_FILES['photo']['size'] . " octets.</br>";

		// afficher le format du fichier
		echo 'Le fichier est au format : ' . $_FILES['photo']['type'].".</br>";

		// checker l'extension du type de fichier
		$uploadedFileType = $_FILES['photo']['type'];
		$uploadedFileSize = $_FILES['photo']['size'];

		if (!strstr($uploadedFileType, 'jpg') && !strstr($uploadedFileType, 'jpeg') 
			&& !strstr($uploadedFileType, 'png') && !strstr($uploadedFileType, 'gif')) {
			echo "ERREUR - Le format du fichier n'est pas correct.</br>";
		}
		elseif ($uploadedFileSize > 10000000) {
			echo "ERREUR - La taille du fichier doit être inférieure à 10 Mo.</br>";
		}
		elseif(move_uploaded_file($_FILES['photo']['tmp_name'], './uploads/'. $_FILES['photo']['name'])) {   // déplacer l'image uploadée
			echo "Le fichier a bien été uploadé.</br>";
		}
		else {
			echo "ERREUR - Votre fichier n'a pas été uploadé.";
		}
	}

?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Inscription</h1>

				<form method="POST" action="#" enctype="multipart/form-data">
					<div class="form-group">
						<label for="lastname">Nom</label>
						<input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname">
					</div>
					<div class="form-group">
						<label for="firstname">Prénom</label>
						<input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname">
					</div>
					<div class="form-group">
						<label for="photo">Photo de profil</label>
						<input type="file" id="photo" name="photo">
						<p class="help-block">La taille de votre photo doit être inférieure à 10 Mo.</br>
						Extensions acceptées : *.jpg, *.png, *.gif</p>
					</div>
					<button type="submit" class="btn btn-default" name="action">Envoyer</button>
				</form>
			</div>	
		</div>
	</div>
</body>

</html>