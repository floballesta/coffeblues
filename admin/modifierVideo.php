<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$video=new Video($db);

if (isset($_POST['btEnvoyer'])){
    $num_video=$_POST['num_video'];
    $titre_video=$_POST['titre_video'];
	$lien_video=$_POST['lien_video'];
    if($lien_video != null)
	{
		if(strpos($lien_video, 'watch?v=') !== false){
			$lien = explode('watch?v=',$lien_video);
			$lien_video = 'https://www.youtube.com/embed/'.$lien[1];
		}
	}
    $modif=$video->updateAll($num_video,$titre_video,$lien_video);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue. Avez-vous modifé un champ ?<br>';
    }
    echo '<a href=indexAdmin.php?page=gestVideo>Retour</a></div>';
}
else{
$monvideo=$video->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier une video :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierVideo', 'modifierVideo', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="num_video" id="num_video" value="'.$monvideo['num_video'].'">';
	echo '<div class="form-group row"><label for="titre_video" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_video',$monvideo['titre_video']).'</div>';
	echo '<div class="form-group row"><label for="lien_video" class="col-sm-2 col-form-label-sm">Lien Youtube ou Facebook :</label>'.$form->ChampTexte('text', 'lien_video',$monvideo['lien_video']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';
}
?>
