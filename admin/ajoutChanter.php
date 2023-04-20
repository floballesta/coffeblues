<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_artiste=$_POST['num_artiste'];
    $num_morceau=$_POST['num_morceau'];
    
	$insertChanter = new Chanter($db);
	$nb = $insertChanter->insertAll($num_morceau, $num_artiste);
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
$morceau = new Morceau($db);
$listemorceau = $morceau->selectAll();
?>
<fieldset>
	<legend>Ajouter un lien entre Morceau et Artiste</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutChanter', 'ajoutChanter', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_artiste" class="col-sm-2 col-form-label-sm">artiste :</label>'.$form->menu('num_artiste', $listeartiste,'num_artiste','nom_artiste','prenom_artiste').'</div>';
	echo '<div class="form-group row"><label for="num_morceau" class="col-sm-2 col-form-label-sm">Morceau :</label>'.$form->menu('num_morceau', $listemorceau,'num_morceau','titre_morceau').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>