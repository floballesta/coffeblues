<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$artiste=new Artiste($db);

if (isset($_POST['btEnvoyer'])){
    
    $photo = null;
    $maphoto = '';
    $photo_artiste = $_POST['photo_artiste'];
    $num_artiste=$_POST['num_artiste'];
    $nom_artiste=$_POST['nom_artiste'];
    $prenom_artiste=$_POST['prenom_artiste'];
    $surnom_artiste=$_POST['surnom_artiste'];
    $datenaiss_artiste=$_POST['datenaiss_artiste'];
    if ($datenaiss_artiste==''){$datenaiss_artiste=null;}
    $datedeces_artiste=$_POST['datedeces_artiste'];
    if ($datedeces_artiste==''){$datedeces_artiste=null;}
    $bio_artiste=$_POST['bio_artiste'];
    $bio_artiste_save=$_POST['bio_artiste_save'];
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($bio_artiste==''){
        $bio_artiste = $bio_artiste_save;
    }
    $photo_artiste = $_POST['photo_artiste'];

	$upload = new Upload(array('png', 'gif', 'jpg', 'jpeg'), 'images_artiste', 4194304);
    $photo = $upload->enregistrer('photo');
    if ($bio_artiste!=null){
		$bio_artiste=str_replace('background-color: rgb(255, 255, 255)','',$bio_artiste);
	}
    //si on enleve l'image existante par une autre, on supprime l'ancienne
    if(!empty($_FILES['photo']['name'])){
        echo 'Il y a une nouvelle photo';
        $maphoto = $photo['nom'];
        if(($photo['nom'] != $photo_artiste)&&($photo_artiste != 'no_image.jpg') ){
            if(file_exists('./images_artiste/'.$photo_artiste)){
                unlink('./images_artiste/'.$photo_artiste);
            }
        }
    }
    else{
        $maphoto = $photo_artiste;
    }

    $modif=$artiste->updateAll($num_artiste,$nom_artiste,$prenom_artiste,$surnom_artiste,$datenaiss_artiste,$datedeces_artiste,$bio_artiste,$maphoto);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien rentré les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestArtiste>Retour</a></div>';
}
else{
$monArtiste=$artiste->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier un artiste</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierArtiste', 'modifierArtiste', 'post','','multipart/form-data');
    echo $form->startForm();
    echo '<input type=hidden name="bio_artiste_save" id="bio_artiste_save" value="'.htmlspecialchars($monArtiste['bio_artiste']).'">';
    echo '<input type=hidden name="photo_artiste" id="photo_artiste" value="'.$monArtiste['photo_artiste'].'">';
    echo '<input type=hidden name="num_artiste" id="num_artiste" value="'.$monArtiste['num_artiste'].'">';
	echo '<div class="form-group row"><label for="nom_artiste" class="col-sm-2 col-form-label-sm">Nom :</label>'.$form->ChampTexte('text', 'nom_artiste',$monArtiste['nom_artiste']).'</div>';
	echo '<div class="form-group row"><label for="prenom_artiste" class="col-sm-2 col-form-label-sm">Prenom :</label>'.$form->ChampTexte('text', 'prenom_artiste',$monArtiste['prenom_artiste']).'</div>';
	echo '<div class="form-group row"><label for="surnom_artiste" class="col-sm-2 col-form-label-sm">Surnom :</label>'.$form->ChampTexte('text', 'surnom_artiste',$monArtiste['surnom_artiste']).'</div>';
	echo '<div class="form-group row"><label for="datenaiss_artiste" class="col-sm-2 col-form-label-sm">Date de naissance :</label>'.$form->ChampTexte('text', 'datenaiss_artiste',$monArtiste['datenaiss_artiste'],'','','','','Date (Ville)').'</div>';
	echo '<div class="form-group row"><label for="datedeces_artiste" class="col-sm-2 col-form-label-sm">Date de décès :</label>'.$form->ChampTexte('text', 'datedeces_artiste',$monArtiste['datedeces_artiste'],'','','','','Date (Ville)').'</div>';
	echo '<div class="form-group row"><label for="bio_artiste" class="col-sm-2 col-form-label-sm">Biographie :</label>'.$form->ChampTexteEnrichi('bio_artiste',$monArtiste['bio_artiste']).'</div>';
    echo '<div class="form-group row"><label for="photo_artiste" class="col-sm-2 col-form-label-sm">Photo :</label><img src="./images_artiste/'.$monArtiste['photo_artiste'].'" width="100" height="150"></div>';
    echo '<div class="form-group row"><label for="affiche_film" class="col-sm-2 col-form-label-sm">Changer l\'image :</label><div class="custom-file col-sm-10"><input type="file" name="photo" id="photo" class="form-control"/></div></div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
