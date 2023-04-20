<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$son=new Son($db);
if($_POST['btAjouter'] != null)
{
    $titre_blues=$_POST['titre_blues'];
    $desc_blues=$_POST['desc_blues'];
    //$position=$_POST['position'];
	$position=null;
	if ($desc_blues!=null){
		$desc_blues=str_replace('background-color: rgb(255, 255, 255)','',$desc_blues);
	}
	if(strpos($desc_blues, '&lt;music&gt;') !== false){
		$num_son = $_POST['num_son'];
		$lien = explode('&lt;music&gt;',$desc_blues);
		$unSon=$son->selectByNum($num_son);
		$desc_blues=$lien[0].'<audio controls src="./son/'.$unSon['lien_son'].'"></audio>'.$lien[1];
	}
	$insertblues = new Blues($db);
	$nb = $insertblues->insertAll($titre_blues, $desc_blues, $position);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'La blues a bien été enregistré.';
	}

}
$listeSon=$son->selectAll();
?>
<fieldset>
	<legend>Ajouter un chapitre de blues :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutBlues', 'ajoutBlues', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_blues" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_blues').'</div>';
	echo '<div class="form-group row"><label for="desc_blues" class="col-sm-2 col-form-label-sm">blues :</label>'.$form->ChampTexteEnrichi('desc_blues').'</div>';
	//echo '<div class="form-group row"><label for="position" class="col-sm-2 col-form-label-sm">Position :</label>'.$form->ChampTexte('text', 'position').'</div>';
	if($listeSon){
		echo 'Pour placer un son dans le texte mettez : &lt;music&gt; <br/>Et sélectionnez le titre que vous voulez entrer :<br>';
			echo '<div class="form-group row"><label for="num_son" class="col-sm-2 col-form-label-sm">Sons :</label>'.$form->menu('num_son', $listeSon,'num_son','titre_son').'</div>';
	}
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin();
?>
</fieldset>