<?php require_once('./classes/listeClass.php');
$histoire = new Histoire($db);
$uneHistoire = $histoire->selectByTitre($_GET['id']);
$comporter=new Comporter($db);
$listeComporter=$comporter->selectByHistoire($_GET['id']);
$row_counter = 0; //don't change that
//----------------------------------------------
//titre_histoire, desc_histoire, video_youtube, num_ouvrage
//----------------------------------------------
$desc_histoire=$uneHistoire['desc_histoire'];
if ($desc_histoire!=null){
	$desc_histoire=str_replace('background-color: rgb(255, 255, 255)','',$desc_histoire);
	$desc_histoire=str_replace('span style="color: rgb(0, 0, 238)','span style="color: rgb(254, 254, 238)',$desc_histoire);
	$desc_histoire=str_replace('span style="color: rgb(0, 0, 0)','span style="color: rgb(254, 254, 238)',$desc_histoire);
}
echo '<div class="container">
		<div class="row text-center">
			<div class="col">
				<span class="text-light font-weight-bold h3">'.$uneHistoire['titre_histoire'].'</span>
			</div>
		</div>
		<p><hr>
		<div class="row">
			<div class="col text-white text-justify">'.$desc_histoire.'</div>
		</div>';
$ouvrage = new Ouvrage($db);
$unOuvrage = $ouvrage->selectByTitre($uneHistoire['num_ouvrage']);
if($uneHistoire['num_ouvrage']!=0){
	echo '<div class="row">
			<div class="col text-light text-right">
					<h5>Histoire tirée de l\'ouvrage :</h5><b>'.$unOuvrage['titre_ouvrage'].'</b><br />
					ISBN : '.$unOuvrage['ISBN'].'<br />
					Auteur : '.$unOuvrage['auteur_ouvrage'].'<br />
					Editeur : '.$unOuvrage['editeur_ouvrage'].'<br />
			</div>
		  </div>';
}
if(!empty($listeComporter)){
	echo '<p><div class="text-light"><h4><u>L\'histoire en vidéo :</u></h4></div></p>
	<div class="row">';
	foreach($listeComporter as $unComp){
		$video = new Video($db);
		$uneVideo = $video->selectByTitre($unComp['num_video']);
		echo '<div class="card text-center" style="width: 18rem; margin : 10px auto;">
				<div class="card-header">'.$uneVideo['titre_video'].'</div>
				<div class="card-body">
					<iframe class="responsive-iframe" src="'.$uneVideo['lien_video'].'" frameborder="0" allowfullscreen></iframe>
				</div>
			  </div>';
	}
	echo '</div>';
}
echo '</div></div>';
?>