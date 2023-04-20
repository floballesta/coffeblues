<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$son=new Son($db);
if($_POST['btAjouter'] != null)
{
    $titre_caracteristique=$_POST['titre_caracteristique'];
    $desc_caracteristique=$_POST['desc_caracteristique'];
	if ($desc_caracteristique!=null){
		$desc_caracteristique=str_replace('background-color: rgb(255, 255, 255)','',$desc_caracteristique);
	}
	if(strpos($desc_caracteristique, '&lt;music&gt;') !== false){
		$num_son = $_POST['num_son'];
		$lien = explode('&lt;music&gt;',$desc_caracteristique);
		$unSon=$son->selectByNum($num_son);
		$desc_caracteristique=$lien[0].'<audio controls src="./son/'.$unSon['lien_son'].'"></audio>'.$lien[1];
	}
	$insertcaracteristique = new Caracteristique($db);
	$nb = $insertcaracteristique->insertAll($titre_caracteristique, $desc_caracteristique);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'La caracteristique a bien été enregistrée.';
	}

}
$caracteristique = new Caracteristique($db);
$listecaracteristique = $caracteristique->selectAll();
$listeSon=$son->selectAll();
?>
<fieldset>
	<legend>Ajouter une caracteristique :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutCaracteristique', 'ajoutCaracteristique', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_caracteristique" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_caracteristique').'</div>';
	echo '<div class="form-group row"><label for="desc_caracteristique" class="col-sm-2 col-form-label-sm">caracteristique :</label>'.$form->ChampTexteEnrichi('desc_caracteristique').'</div>';
	if($listeSon){
		echo 'Pour placer un son dans le texte mettez : &lt;music&gt; <br/>Et sélectionnez le titre que vous voulez entrer :<br>';
			echo '<div class="form-group row"><label for="num_son" class="col-sm-2 col-form-label-sm">Sons :</label>'.$form->menu('num_son', $listeSon,'num_son','titre_son').'</div>';
	}
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>