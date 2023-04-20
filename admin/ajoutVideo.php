<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
    $titre_video=$_POST['titre_video'];
    $lien_video=$_POST['lien_video'];
	if($lien_video != null)
	{
		if(strpos($lien_video, 'watch?v=') !== false){
			$lien = explode('watch?v=',$lien_video);
			$lien_video = 'https://www.youtube.com/embed/'.$lien[1];
		}
	}
	$insertvideo = new video($db);
	$nb = $insertvideo->insertAll($titre_video, $lien_video);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'Le video a bien été enregistré.';
	}

}
?>
<fieldset>
	<legend>Ajouter une video pour une histoire :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutVideo', 'ajoutVideo', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_video" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_video').'</div>';
	echo '<div class="form-group row"><label for="lien_video" class="col-sm-2 col-form-label-sm">Lien Youtube :</label>'.$form->ChampTexte('text', 'lien_video').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>