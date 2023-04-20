<?php require_once('./classes/listeClass.php');
$catblues = new Catblues($db);
$listeCat = $catblues->selectAll();



//----------------------------------------------

echo '<div class="container content-row text-center">';
foreach($listeCat as $unCat){
	if($unCat['num_catblues'] > 0){
		echo '<div class="row"><h2 class="display-6 text-light">'.$unCat['titre_catblues'].'</h2></div><br>';
		//$row_counter = 0; //don't change that
		$id=$unCat['num_catblues'];
		$histoire = new Histoire($db);
		$listeHistoire = $histoire->selectByCat($id);
		echo '<div class="row">';
		foreach($listeHistoire as $uneHistoire){
			//$row_counter++;
			echo '<div class="col-lg-4">
					<div class="card shadow h-100">
						<div class="card-body">
							<h5 class="card-title">'.$uneHistoire['titre_histoire'].'</h5>
							<a href="index.php?page=unehistoire&id='.$uneHistoire['num_histoire'].'" class="card-link">Lire l\'histoire</a>
						</div>
					</div>
				  </div>';
			/*if ($row_counter  == 3) {
				$row_counter = 0;
				echo '</div><br /><div class="row">';
			}  */
		} 
		echo '</div><p>';
	}
}

echo '</div>
</div>';
?>
