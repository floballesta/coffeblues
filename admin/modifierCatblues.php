<?php 
require_once('./classes/listeClass.php');
$id=$_GET['id'];

if(isset($_POST['btEnvoyer']))
{
	$num_catblues = $_POST['num_catblues'];
	$titre_catblues = $_POST['titre_catblues'];
	$modifcatblues = new Catblues($db);
	$nb = $modifcatblues->updateAll($num_catblues,$titre_catblues);
	if($nb != 1)
	{
		echo '<div class="text-center">Erreur de l\'insertion.<br>';
	}
	else
	{
		echo '<div class="text-center">La catégorie a bien été modifiée.<br>';
	}
	echo '<a href=indexAdmin.php?page=gestcatblues>Retour</a></div>';
}
$catblues = new Catblues($db);
$moncatblues=$catblues->selectByNum($id);
?>
<fieldset>
	<legend>Modifier une catégorie de l'histoire du blues</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=modifierCatblues', 'modifierCatblues', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="num_catblues" id="num_catblues" value="'.$moncatblues['num_catblues'].'">';
    echo '<div class="form-group row"><label for="titre_catblues" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_catblues',$moncatblues['titre_catblues']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin(); ?>
</input>
</fieldset>

