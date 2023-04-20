<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
    $titre_histoire=$_POST['titre_histoire'];
    $desc_histoire=$_POST['desc_histoire'];
    $num_ouvrage=$_POST['num_ouvrage'];
	$num_catblues=$_POST['num_catblues'];
	if ($desc_histoire!=null){
		$desc_histoire=str_replace('background-color: rgb(255, 255, 255)','',$desc_histoire);
	}
	$insertHistoire = new Histoire($db);
	$nb = $insertHistoire->insertAll($titre_histoire, $desc_histoire, $num_ouvrage, $num_catblues);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'L\'histoire a bien été enregistré.';
	}

}
$histoire = new Histoire($db);
$listeHistoire = $histoire->selectAll();
$ouvrage=new Ouvrage($db);
$listeOuvrage=$ouvrage->selectAll();
$catBlues=new Catblues($db);
$listecatBlues=$catBlues->selectAll();
?>
<fieldset>
	<legend>Ajouter une histoire :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutHistoire', 'ajoutHistoire', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_histoire" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_histoire').'</div>';
	echo '<div class="form-group row"><label for="desc_histoire" class="col-sm-2 col-form-label-sm">Histoire :</label>'.$form->ChampTexteEnrichi('desc_histoire').'</div>';
	echo '<div class="form-group row"><label for="num_ouvrage" class="col-sm-2 col-form-label-sm">Ouvrage :</label>'.$form->menu('num_ouvrage', $listeOuvrage,'num_ouvrage','titre_ouvrage').'</div>';
	echo '<div class="msg form-group row"><label for="num_catblues" class="col-sm-2 col-form-label-sm">Catégorie Blues :</label>'.$form->menu('num_catblues', $listecatBlues,'num_catblues','titre_catblues').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>