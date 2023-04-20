<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_histoire=$_POST['num_histoire'];
    $num_ville=$_POST['num_ville'];
    
	$insertContenir = new Contenir($db);
	$nb = $insertContenir->insertAll($num_ville, $num_histoire);
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
$ville = new Ville($db);
$listeville = $ville->selectAll();
?>
<fieldset>
	<legend>Ajouter un lien entre Ville et Histoire</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutContenir', 'ajoutContenir', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_histoire" class="col-sm-2 col-form-label-sm">Histoire :</label>'.$form->menu('num_histoire', $listeHistoire,'num_histoire','titre_histoire').'</div>';
	echo '<div class="form-group row"><label for="num_ville" class="col-sm-2 col-form-label-sm">Ville :</label>'.$form->menu('num_ville', $listeville,'num_ville','nom_ville').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>