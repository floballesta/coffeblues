<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$film=new Film($db);
if (isset($_POST['btEnvoyer'])){
    $photo = null;
    $affiche = '';
    $num_film=$_POST['num_film'];
    $titre_film=$_POST['titre_film'];
    $realisateur_film=$_POST['realisateur_film'];
    $annee_film=$_POST['annee_film'];
    $duree_film=$_POST['duree_film'];
    $contexte_film=$_POST['contexte_film'];
    $synopsis_film=$_POST['synopsis_film'];
    $contexte_film_save=$_POST['contexte_film_save'];
    $synopsis_film_save=$_POST['synopsis_film_save'];
    $affiche_film=$_POST['affiche_film'];
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($contexte_film==''){
        $contexte_film = $contexte_film_save;
    }
    if($synopsis_film==''){
        $synopsis_film = $synopsis_film_save;
    }
    if ($contexte_film!=null){
		$contexte_film=str_replace('background-color: rgb(255, 255, 255)','',$contexte_film);
    }
    if ($synopsis_film!=null){
		$synopsis_film=str_replace('background-color: rgb(255, 255, 255)','',$synopsis_film);
	}
    $upload = new Upload(array('png', 'gif', 'jpg', 'jpeg'), 'images', 4194304);
    $photo = $upload->enregistrer('photo');
    //si on enleve l'image existante par une autre, on supprime l'ancienne
    if(!empty($_FILES['photo']['name'])){
        $affiche = $photo['nom'];
        if(($photo['nom'] != $affiche_film)&& ($affiche_film != 'no_image.jpg')){
            if(file_exists('./images/'.$affiche_film)){
                unlink('./images/'.$affiche_film);
            }
        }
    }
    else{
        $affiche = $affiche_film;
    }
    $lien_film=$_POST['lien_film'];
    if($lien_film != null)
	{
		if(strpos($lien_film, 'watch?v=') !== false){
			$lien = explode('watch?v=',$lien_film);
			$lien_film = 'https://www.youtube.com/embed/'.$lien[1];
		}
	}
    $modif=$film->updateAll($num_film, $titre_film, $realisateur_film, $annee_film, $duree_film, $contexte_film, $synopsis_film, $affiche, $lien_film);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestFilm>Retour</a></div>';
}
else{
$monFilm=$film->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier un film</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierFilm', 'modifierFilm', 'post','','multipart/form-data');
    echo $form->startForm();
    echo '<input type="hidden" name="contexte_film_save" id="contexte_film_save" value="'.htmlspecialchars($monFilm['contexte_film']).'">';
    echo '<input type="hidden" name="synopsis_film_save" id="synopsis_film_save" value="'.htmlspecialchars($monFilm['synopsis_film']).'">';
    echo '<input type="hidden" name="affiche_film" id="affiche_film" value="'.$monFilm['affiche_film'].'">';
    echo '<input type="hidden" name="num_film" id="num_film" value="'.$monFilm['num_film'].'">';
	echo '<div class="form-group row"><label for="titre_film" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_film',$monFilm['titre_film']).'</div>';
	echo '<div class="form-group row"><label for="realisateur_film" class="col-sm-2 col-form-label-sm">Réalisatrice(eur) :</label>'.$form->ChampTexte('text', 'realisateur_film',$monFilm['realisateur_film']).'</div>';
	echo '<div class="form-group row"><label for="annee_film" class="col-sm-2 col-form-label-sm">Année (AAAA) :</label>'.$form->ChampTexte('text', 'annee_film',$monFilm['annee_film']).'</div>';
	echo '<div class="form-group row"><label for="duree_film" class="col-sm-2 col-form-label-sm">Durée du film :</label>'.$form->ChampTexte('text', 'duree_film',$monFilm['duree_film']).'</div>';
	echo '<div class="form-group row"><label for="contexte_film" class="col-sm-2 col-form-label-sm">Contexte :</label>'.$form->ChampTexteEnrichi('contexte_film',$monFilm['contexte_film']).'</div>';
    echo '<div class="form-group row"><label for="synopsis_film" class="col-sm-2 col-form-label-sm">Synopsis :</label>'.$form->ChampTexteEnrichi2('synopsis_film',$monFilm['synopsis_film']).'</div>';
	echo '<div class="form-group row"><label for="affiche_film" class="col-sm-2 col-form-label-sm">Affiche :</label><img src="./images/'.$monFilm['affiche_film'].'" width="100" height="150"></div>';
    echo '<div class="form-group row"><label for="affiche_film" class="col-sm-2 col-form-label-sm">Changer l\'affiche :</label><div class="custom-file col-sm-10"><input type="file" name="photo" id="photo" class="form-control"/></div></div>';
	echo '<div class="form-group row"><label for="lien_film" class="col-sm-2 col-form-label-sm">Bande-annonce Youtube :</label>'.$form->ChampTexte('text', 'lien_film',$monFilm['lien_film']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
