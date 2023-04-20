<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');

if($_POST['btAjouter'] != null)
{
	$titre_son = $_POST['titre_son'];
	$son = null;
	$upload = new Upload(array('mp3', 'wav', 'aac'), 'son', 10962232);
	$son = $upload->enregistrer('son');
	$insertson = new Son($db);
	$nb = $insertson->insertAll($titre_son, $son['nom']);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'Le son a bien été enregistré.';
	}
}
?>
<fieldset>
	<legend>Ajouter un son</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutSon', 'ajoutSon', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_son" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_son').'</div>';
	echo '<div class="form-group row"><label for="lien_son" class="col-sm-2 col-form-label-sm">Fichier son :</label><div class="custom-file col-sm-10"><input type="file" name="son" id="son" class="form-control"/></div></div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</input>
</fieldset>
<font color=red>Attention : </font><br/>
pas plus de 10Mo par mp3<br/>
<!--Include the JS & CSS-->

