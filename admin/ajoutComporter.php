<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_histoire=$_POST['num_histoire'];
    $num_video=$_POST['num_video'];
    
	$insertComporter = new Comporter($db);
	$nb = $insertComporter->insertAll($num_histoire, $num_video);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion. Ce lien existe peut-être déjà';
	}
	else
	{
		echo 'Le lien a bien été enregistré.';
	}
}
$histoire = new Histoire($db);
$listeHistoire = $histoire->selectAll();
$video = new Video($db);
$listevideo = $video->selectAll();
?>
<fieldset>
	<legend>Ajouter un lien entre Video et Histoire</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutComporter', 'ajoutComporter', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_histoire" class="col-sm-2 col-form-label-sm">Histoire :</label>'.$form->menu('num_histoire', $listeHistoire,'num_histoire','titre_histoire').'</div>';
	echo '<div class="form-group row"><label for="num_video" class="col-sm-2 col-form-label-sm">video :</label>'.$form->menu('num_video', $listevideo,'num_video','titre_video').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>