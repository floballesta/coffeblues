<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');

if($_POST['btAjouter'] != null)
{
	$titre_film = $_POST['titre_film'];
	$realisateur_film = $_POST['realisateur_film'];
	$annee_film = $_POST['annee_film'];
	$duree_film = $_POST['duree_film'];
	$contexte_film = $_POST['contexte_film'];
	$synopsis_film = $_POST['synopsis_film'];
	$photo = null;
	$upload = new Upload(array('png', 'gif', 'jpg', 'jpeg', 'webp'), 'images', 4194304);
	$photo = $upload->enregistrer('photo');
	if($photo['nom']==''){
		$photo['nom'] = 'no_image.jpg';
	}
	if ($contexte_film!=null){
		$contexte_film=str_replace('background-color: rgb(255, 255, 255)','',$contexte_film);
	}
	if ($synopsis_film!=null){
		$synopsis_film=str_replace('background-color: rgb(255, 255, 255)','',$synopsis_film);
	}
	$lien_film=$_POST['lien_film'];
	if($lien_film != null)
	{
		if(strpos($lien_film, 'watch?v=') !== false){
			$lien = explode('watch?v=',$lien_film);
			$lien_film = 'https://www.youtube.com/embed/'.$lien[1];
		}
	}
	$insertFilm = new Film($db);
	$nb = $insertFilm->insertAll($titre_film, $realisateur_film, $annee_film, $duree_film, $contexte_film, $synopsis_film, $photo['nom'], $lien_film);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'Le film a bien été enregistré.';
	}
}
?>
<fieldset>
	<legend>Ajouter un Film</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutFilm', 'ajoutFilm', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_film" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_film').'</div>';
	echo '<div class="form-group row"><label for="realisateur_film" class="col-sm-2 col-form-label-sm">Réalisatrice(eur) :</label>'.$form->ChampTexte('text', 'realisateur_film').'</div>';
	echo '<div class="form-group row"><label for="annee_film" class="col-sm-2 col-form-label-sm">Année :</label>'.$form->ChampTexte('text', 'annee_film').'</div>';
	echo '<div class="form-group row"><label for="duree_film" class="col-sm-2 col-form-label-sm">Durée du film :</label>'.$form->ChampTexte('text', 'duree_film').'</div>';
	echo '<div class="form-group row"><label for="contexte_film" class="col-sm-2 col-form-label-sm">Contexte :</label>'.$form->ChampTexteEnrichi('contexte_film').'</div>';
	echo '<div class="form-group row"><label for="synopsis_film" class="col-sm-2 col-form-label-sm">Synopsis :</label>'.$form->ChampTexteEnrichi2('synopsis_film').'</div>';
	echo '<div class="form-group row"><label for="affiche_film" class="col-sm-2 col-form-label-sm">Affiche :</label><div class="custom-file col-sm-10"><input type="file" name="photo" id="photo" class="form-control"/></div></div>';
	echo '<div class="form-group row"><label for="lien_film" class="col-sm-2 col-form-label-sm">Bande-annonce Youtube :</label>'.$form->ChampTexte('text', 'lien_film').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</input>
</fieldset>
<!--Include the JS & CSS-->

