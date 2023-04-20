<?php require_once('./classes/listeClass.php');
$morceau = new Morceau($db);
$listeMorceau = $morceau->selectAll();
//----------------------------------------------
if($listeMorceau){
echo '<div class="container h-100 align-items-center">';

foreach($listeMorceau as $unMorceau){
	echo '<div class="row align-items-center shadow rounded">';
	echo '<div class="col-lg-4">';
	if(strpos($unMorceau['lien_morceau'], 'youtube') !== false){
		echo '<iframe class="responsive-iframe" src="'.$unMorceau['lien_morceau'].'" frameborder="0" allowfullscreen></iframe>';
			
	}
	else{
		echo '<div class="fb-video" data-href="'.$unMorceau['lien_morceau'].'" data-allowfullscreen="true" data-width="800"></div>';
	}
	echo '</div>
	<div class="col-lg-8">
	<div class="text-white h4 font-weight-bold">'.$unMorceau['titre_morceau'].'</div>
	<p><div class="text-light h6 text-justify">'.$unMorceau['desc_morceau'].'</div></p>
	</div></div><p>';
} 
echo '</div>';
}else{
	echo '<div class="text-light text-center">Bientôt les morceaux choisis des Bluesy Buddies</div>';
}
?>