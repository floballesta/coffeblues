<?php require_once('./classes/listeClass.php');
$caracteristique = new Caracteristique($db);
$unecaracteristique = $caracteristique->selectByTitre($_GET['id']);

//----------------------------------------------
//titre_caracteristique, desc_caracteristique
//----------------------------------------------
echo '<div class="container">
		<div class="row text-center">
			<div class="col">
				<span class="text-light font-weight-bold h3">'.$unecaracteristique['titre_caracteristique'].'</span>
			</div>
		</div>
		<p><hr>
		<div class="row">
			<div class="col text-white text-justify">'.$unecaracteristique['desc_caracteristique'].'</div>
		</div>';
echo '</div></div>';
?>