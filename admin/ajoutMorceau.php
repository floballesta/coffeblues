<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
    $titre_morceau=$_POST['titre_morceau'];
    $desc_morceau=$_POST['desc_morceau'];
    $lien_morceau=$_POST['lien_morceau'];
	if($lien_morceau != null)
	{
		if(strpos($lien_morceau, 'watch?v=') !== false){
			$lien = explode('watch?v=',$lien_morceau);
			$lien_morceau = 'https://www.youtube.com/embed/'.$lien[1];
		}
	}
	if ($desc_morceau!=null){
		$desc_morceau=str_replace('background-color: rgb(255, 255, 255)','',$desc_morceau);
	}
	$insertMorceau = new Morceau($db);
	$nb = $insertMorceau->insertAll($titre_morceau, $desc_morceau, $lien_morceau);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'Le morceau a bien été enregistré.';
	}

}
?>
<fieldset>
	<legend>Ajouter un morceau des Bluesy :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutMorceau', 'ajoutMorceau', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_morceau" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_morceau').'</div>';
	echo '<div class="form-group row"><label for="desc_morceau" class="col-sm-2 col-form-label-sm">Description :</label>'.$form->ChampTexteEnrichi('desc_morceau').'</div>';
	echo '<div class="form-group row"><label for="lien_morceau" class="col-sm-2 col-form-label-sm">Lien Youtube ou Facebook :</label>'.$form->ChampTexte('text', 'lien_morceau').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset><div class="lien">
<p><center><a href="./img/lien_facebook.png" target=_blank>Comment obtenir le lien Facebook ?</a></center></div>