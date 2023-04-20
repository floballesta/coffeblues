<?php require_once('./classes/listeClass.php');
$film = new Film($db);
$unFilm = $film->selectByTitre($_GET['id']);
$referencer=new Referencer($db);
$listeReferencer=$referencer->selectByFilm($_GET['id']);
//----------------------------------------------
//titre_film, realisateur_film, annee_film,contexte_film,synopsis_film,affiche_film
//----------------------------------------------
echo '<div class="container">
		<div class="row text-center">
			<div class="col">
				<span class="text-light font-weight-bold h3">'.$unFilm['titre_film'].'</span>
			</div>
		</div>
		<p><hr>
		<div class="row">
			<div class="col-md-4">
				<img id="img-affiche" class="rounded img-fluid mx-auto d-block" src="./images/'.$unFilm['affiche_film'].'">
			</div>
			<div class="col-md-8">
				<div class="text-justify  bordure bg-light">
				<label for="annee_film"><b>Année de sortie : </b></label> '.$unFilm['annee_film'].'<br />
				<label for="duree_film"><b>Durée : </b></label> '.$unFilm['duree_film'].'<br />
				<label for="realisateur_film"><b>Réalisateur : </b></label> '.$unFilm['realisateur_film'].'<br />
				<p><h5><u>Synopsis :</u></h5></p><p><h6>'.$unFilm['synopsis_film'].'</h6></p>
			</div>
		</div>
		</div>
		<div class="container">
		<div class="row">';
		if($unFilm['lien_film']){
			echo '<div class="col-md-auto">
				<div class="text-justify">
					<p><h4><u></u></h4></p>
					<iframe class="responsive-iframe" src="'.$unFilm['lien_film'].'" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>';
		}
			echo '<div class="col">
				<div class="text-light text-justify">
					<p><h4><u>Contexte du film :</u></h4></p>
					<h5>'.$unFilm['contexte_film'].'</h5>
				</div>
			</div>
		</div>';
if(!empty($listeReferencer)){
	echo '<div class="row">
			<div class="col">
			<h4><u>Ses bluesmen :</u></h4><br />
			<ul>';
			foreach($listeReferencer as $uneReference)
			{
				$artiste = new Artiste($db);
				$unArtiste = $artiste->selectByTitre($uneReference['num_artiste']);
			echo '<li><a href="index.php?page=unartiste&id='.$unArtiste['num_artiste'].'">'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</a></li>';
			}
			echo '</ul>';
		echo '</div></div></div>';
}
echo '</div></div>';
?>