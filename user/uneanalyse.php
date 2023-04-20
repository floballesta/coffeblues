<?php require_once('./classes/listeClass.php');
$analyse = new Analyse($db);
$uneanalyse = $analyse->selectByTitre($_GET['id']);

//----------------------------------------------
//titre_analyse, desc_analyse
//----------------------------------------------
echo '<div class="container">
		<div class="row text-center">
			<div class="col">
				<span class="text-light font-weight-bold h3">'.$uneanalyse['titre_analyse'].'</span>
			</div>
		</div>
		<p><hr>
		<div class="row">
			<div class="col text-white text-justify">'.$uneanalyse['desc_analyse'].'</div>
		</div>';
echo '</div></div>';
?>