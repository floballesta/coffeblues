<?php require_once('./classes/listeClass.php');
$artiste = new Artiste($db);
$unArtiste = $artiste->selectByTitre($_GET['id']);
$lier=new Lier($db);
$listeLier=$lier->selectByArtiste($_GET['id']);
$composer=new Composer($db);
$listeComposer=$composer->selectByArtiste($_GET['id']);
$chanter=new Chanter($db);
$listeChanter=$chanter->selectByArtiste($_GET['id']);


//----------------------------------------------
//nom_artiste, prenom_artiste, surnom_artiste, datenaiss_artiste, datedeces_artiste, bio_artiste, photo_artiste
//----------------------------------------------

echo '<div class="container">
		<div class="row text-center">
		<div class="col">
			<span class="text-light font-weight-bold h3">'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</span>
		</div>
		<div class="col">
			<span class="text-light font-weight-bold font-italic h4">Surnom : '.$unArtiste['surnom_artiste'].'</span>
		</div>	
		</div>
		<p><hr>
		<div class="row">
			<div class="col-md-4 text-light">
				<img id="img-affiche" class="rounded img-fluid" src="./images_artiste/'.$unArtiste['photo_artiste'].'">';
				if(!empty($listeLier)){
					echo '<p><h4><u>Ses histoires :</u></h4>
					<ul>';
					foreach($listeLier as $unLien)
					{
						$histoire = new Histoire($db);
						$uneHistoire = $histoire->selectByTitre($unLien['num_histoire']);
					echo '<li><a href="index.php?page=unehistoire&id='.$uneHistoire['num_histoire'].'">'.$uneHistoire['titre_histoire'].'</a></li>';
					}
					echo '</ul></p>';
				}
	echo '	</div>
			  <div class="col-md-8">
				<div class="text-justify  bordure bg-light">
				<h4><u>Biographie :</u></h4>
				<label for="datenaiss_artiste"><b>Naissance :</b> </label>'.$unArtiste['datenaiss_artiste'].'<br />';
				if ($unArtiste['datedeces_artiste']!= null){
					echo '<label for="datedeces_artiste"><b>Décès :</b> </label>'.$unArtiste['datedeces_artiste'].'<p>';
				}
				echo '<h5>'.$unArtiste['bio_artiste'].'</h5>
			</div>
			</div>
		</div>';
	if(!empty($listeComposer)){
		echo '<div class="text-light"><p><h4><u>Ses oeuvres :</u></h4></p></div>
		<div class="row">';
		foreach($listeComposer as $unComp){
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
	if(!empty($listeChanter)){
		echo '<div class="text-light"><p><h4><u>Live des BluesyBuddies :</u></h4></p></div>
		<div class="row">';
		foreach($listeChanter as $unChant)
		{
			$morceau = new Morceau($db);
			$unMorceau = $morceau->selectByTitre($unChant['num_morceau']);
			echo '<div class="card text-dark text-center" style="width: 18rem; margin : 10px auto;">
			<div class="card-header">'.$unMorceau['titre_morceau'].'</div>
			<div class="card-body">';
			if(strpos($unMorceau['lien_morceau'], 'youtube') !== false){
				echo '<iframe class="responsive-iframe" src="'.$unMorceau['lien_morceau'].'" frameborder="0" allowfullscreen></iframe>';
					
			}
			else{
				echo '<div class="fb-video" data-href="'.$unMorceau['lien_morceau'].'" data-allowfullscreen="true" data-width="800"></div>';
			}
		echo'</div>
			</div>';
		}
		echo '</div>';
	}
echo '</div>';
?>