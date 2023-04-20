<?php require_once('./classes/listeClass.php');
$artiste = new Artiste($db);
$listeArtiste = $artiste->selectAll();
$row_counter = 0; //don't change that
$col_lg_x = 3; //Bootstrap - choose either 2,3,4 or 6 to have 6,4,3 or 2 pics per line respectively
$col_md_x = 4; 
$col_sm_x = 6;
$row_x = 12 / $col_lg_x;
//----------------------------------------------

echo '<div id="mesimages" class="container text-center">
  <div class="row">';

foreach($listeArtiste as $unArtiste){
	$row_counter++;
	echo '<div class="col-lg-4">
	<a href="index.php?page=unartiste&id='.$unArtiste['num_artiste'].'">
	<img class="img-thumbnail" src="./images_artiste/'.$unArtiste['photo_artiste'].'">
	</a>
	<br />
	<span class="text-light font-weight-bold">'.$unArtiste['surnom_artiste'].'</span>
	</div>';
	if ($row_counter  == 3) {
		$row_counter = 0;
		echo '</div><br /><div class="row">';
	}  
} 
echo '</div>	
</div>';
?>