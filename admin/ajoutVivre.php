<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_artiste=$_POST['num_artiste'];
    $num_ville=$_POST['num_ville'];
    
	$insertVivre = new Vivre($db);
	$nb = $insertVivre->insertAll($num_ville, $num_artiste);
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
$ville = new Ville($db);
$listeville = $ville->selectAll();
?>
<fieldset>
	<legend>Ajouter un Artiste vivant dans une Ville :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutVivre', 'ajoutVivre', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_artiste" class="col-sm-2 col-form-label-sm">Artiste :</label>'.$form->menu('num_artiste', $listeartiste,'num_artiste','nom_artiste','prenom_artiste').'</div>';
	echo '<div class="form-group row"><label for="num_ville" class="col-sm-2 col-form-label-sm">Ville :</label>'.$form->menu('num_ville', $listeville,'num_ville','nom_ville').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>