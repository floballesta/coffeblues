<?php require_once('./classes/listeClass.php');
$analyse = new analyse($db);
$listeanalyse = $analyse->selectAll();

//----------------------------------------------

echo '<div class="container content-row text-center">
  <div class="row">';
foreach($listeanalyse as $uneanalyse){
	$row_counter++;
	echo '<div class="col-md">
		<div class="card shadow h-100">
			<div class="card-body">
				<h5 class="card-title">'.$uneanalyse['titre_analyse'].'</h5>
				<a href="index.php?page=uneanalyse&id='.$uneanalyse['num_analyse'].'" class="card-link">Lire l\'analyse</a>
			</div>
		</div>
	</div>';
} 
echo '</div>
</div>';
?>
