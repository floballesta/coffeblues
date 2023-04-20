<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_histoire=$_POST['num_histoire'];
    $num_artiste=$_POST['num_artiste'];
    
	$insertLier = new Lier($db);
	$nb = $insertLier->insertAll($num_histoire, $num_artiste);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'Le lien a bien été enregistré.';
	}
}
$histoire = new Histoire($db);
$listeHistoire = $histoire->selectAll();
$artiste = new Artiste($db);
$listeArtiste = $artiste->selectAll();
?>
<fieldset>
	<legend>Ajouter un lien entre Artiste et Histoire</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutLier', 'ajoutLier', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_histoire" class="col-sm-2 col-form-label-sm">Histoire :</label>'.$form->menu('num_histoire', $listeHistoire,'num_histoire','titre_histoire').'</div>';
	echo '<div class="form-group row"><label for="num_artiste" class="col-sm-2 col-form-label-sm">Artiste :</label>'.$form->menu('num_artiste', $listeArtiste,'num_artiste','prenom_artiste','nom_artiste').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>