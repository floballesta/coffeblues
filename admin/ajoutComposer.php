<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_artiste=$_POST['num_artiste'];
    $num_video=$_POST['num_video'];
    
	$insertComposer = new Composer($db);
	$nb = $insertComposer->insertAll($num_artiste, $num_video);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion. Ce lien existe peut-être déjà';
	}
	else
	{
		echo 'Le lien a bien été enregistré.';
	}
}
$artiste = new Artiste($db);
$listeartiste = $artiste->selectAll();
$video = new Video($db);
$listevideo = $video->selectAll();
?>
<fieldset>
	<legend>Ajouter un lien entre Video et artiste</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutComposer', 'ajoutComposer', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_artiste" class="col-sm-2 col-form-label-sm">artiste :</label>'.$form->menu('num_artiste', $listeartiste,'num_artiste','nom_artiste','prenom_artiste').'</div>';
	echo '<div class="form-group row"><label for="num_video" class="col-sm-2 col-form-label-sm">video :</label>'.$form->menu('num_video', $listevideo,'num_video','titre_video').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>