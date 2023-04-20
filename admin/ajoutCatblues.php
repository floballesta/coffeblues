<?php 
require_once('./classes/listeClass.php');

if($_POST['btAjouter'] != null)
{
	$titre_catblues = $_POST['titre_catblues'];
	$insertcatblues = new Catblues($db);
	$nb = $insertcatblues->insertAll($titre_catblues);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'Le catblues a bien été enregistré.';
	}
}
?>
<fieldset>
	<legend>Ajouter une catégorie de l'histoire du blues</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutCatblues', 'ajoutCatblues', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_catblues" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_catblues').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</input>
</fieldset>

