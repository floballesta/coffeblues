<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$ISBN=$_POST['ISBN'];
	$titre_ouvrage=$_POST['titre_ouvrage'];
	$theme_ouvrage=$_POST['theme_ouvrage'];
    $auteur_ouvrage=$_POST['auteur_ouvrage'];
	$editeur_ouvrage=$_POST['editeur_ouvrage'];
	
	$insertOuvrage = new Ouvrage($db);
	$nb = $insertOuvrage->insertAll($ISBN, $titre_ouvrage, $theme_ouvrage, $auteur_ouvrage, $editeur_ouvrage);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'L\'ouvrage a bien été enregistré.';
	}
}
?>
<fieldset>
	<legend>Ajouter un ouvrage</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutOuvrage', 'ajoutOuvrage', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="ISBN" class="col-sm-2 col-form-label-sm">ISBN :</label>'.$form->ChampTexte('text', 'ISBN').'</div>';
	echo '<div class="form-group row"><label for="titre_ouvrage" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_ouvrage').'</div>';
	echo '<div class="form-group row"><label for="theme_ouvrage" class="col-sm-2 col-form-label-sm">Theme :</label>'.$form->ChampTexte('text', 'theme_ouvrage').'</div>';
	echo '<div class="form-group row"><label for="auteur_ouvrage" class="col-sm-2 col-form-label-sm">Auteur :</label>'.$form->ChampTexte('text', 'auteur_ouvrage').'</div>';
	echo '<div class="form-group row"><label for="editeur_ouvrage" class="col-sm-2 col-form-label-sm">Editeur :</label>'.$form->ChampTexte('text', 'editeur_ouvrage').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>