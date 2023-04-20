<?php require_once('./classes/listeClass.php');
$caracteristique = new caracteristique($db);
$listecaracteristique = $caracteristique->selectAll();

//----------------------------------------------

echo '<div class="container content-row text-center">
  <div class="row">';
foreach($listecaracteristique as $unecaracteristique){
	$row_counter++;
	echo '<div class="col-md">
		<div class="card shadow h-100">
			<div class="card-body">
				<h5 class="card-title">'.$unecaracteristique['titre_caracteristique'].'</h5>
				<a href="index.php?page=unecaracteristique&id='.$unecaracteristique['num_caracteristique'].'" class="card-link">Lire la caractéristique</a>
			</div>
		</div>
	</div>';
 
} 
echo '</div>
</div>';
?>
