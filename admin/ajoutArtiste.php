<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{	
	$photo = null;
    $nom_artiste=$_POST['nom_artiste'];
    $prenom_artiste=$_POST['prenom_artiste'];
    $surnom_artiste=$_POST['surnom_artiste'];
    $datenaiss_artiste=$_POST['datenaiss_artiste'];
	if ($datenaiss_artiste==''){$datenaiss_artiste=null;}
	$datedeces_artiste=$_POST['datedeces_artiste'];
	if ($datedeces_artiste==''){$datedeces_artiste=null;}
    $bio_artiste=$_POST['bio_artiste'];
	$upload = new Upload(array('png', 'gif', 'jpg', 'jpeg'), 'images_artiste', 4194304);
	$photo = $upload->enregistrer('photo');
	if($photo['nom']==''){
		$photo['nom'] = 'no_image.jpg';
	}
	if ($bio_artiste!=null){
		$bio_artiste=str_replace('background-color: rgb(255, 255, 255)','',$bio_artiste);
	}
	$insertArtiste = new Artiste($db);
	$nb = $insertArtiste->insertAll($nom_artiste, $prenom_artiste, $surnom_artiste, $datenaiss_artiste, $datedeces_artiste, $bio_artiste, $photo['nom']);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'L\'artiste a bien été enregistré.';
	}
}
?>
<fieldset>
	<legend>Ajouter un artiste</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutArtiste', 'ajoutArtiste', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="nom_artiste" class="col-sm-2 col-form-label-sm">Nom :</label>'.$form->ChampTexte('text', 'nom_artiste').'</div>';
	echo '<div class="form-group row"><label for="prenom_artiste" class="col-sm-2 col-form-label-sm">Prenom :</label>'.$form->ChampTexte('text', 'prenom_artiste').'</div>';
	echo '<div class="form-group row"><label for="surnom_artiste" class="col-sm-2 col-form-label-sm">Surnom :</label>'.$form->ChampTexte('text', 'surnom_artiste').'</div>';
	echo '<div class="form-group row"><label for="datenaiss_artiste" class="col-sm-2 col-form-label-sm">Date de naissance :</label>'.$form->ChampTexte('text', 'datenaiss_artiste','','','','','','Date (Ville)').'</div>';
	echo '<div class="form-group row"><label for="datedeces_artiste" class="col-sm-2 col-form-label-sm">Date de décès :</label>'.$form->ChampTexte('text', 'datedeces_artiste','','','','','','Date (Ville)').'</div>';
	echo '<div class="form-group row"><label for="bio_artiste" class="col-sm-2 col-form-label-sm">Biographie :</label>'.$form->ChampTexteEnrichi('bio_artiste').'</div>';
	echo '<div class="form-group row"><label for="photo_artiste" class="col-sm-2 col-form-label-sm">Photo :</label><div class="custom-file col-sm-10"><input type="file" name="photo" id="photo" class="form-control"/></div></div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>