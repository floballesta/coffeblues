<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$son=new Son($db);
if($_POST['btAjouter'] != null)
{
    $titre_analyse=$_POST['titre_analyse'];
    $desc_analyse=$_POST['desc_analyse'];
	if ($desc_analyse!=null){
		$desc_analyse=str_replace('background-color: rgb(255, 255, 255)','',$desc_analyse);
	}
	if(strpos($desc_analyse, '&lt;music&gt;') !== false){
		$num_son = $_POST['num_son'];
		$lien = explode('&lt;music&gt;',$desc_analyse);
		$unSon=$son->selectByNum($num_son);
		$desc_analyse=$lien[0].'<audio controls src="./son/'.$unSon['lien_son'].'"></audio>'.$lien[1];
	}
	$insertanalyse = new Analyse($db);
	$nb = $insertanalyse->insertAll($titre_analyse, $desc_analyse);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'L\'analyse a bien été enregistrée.';
	}

}
$analyse = new Analyse($db);
$listeanalyse = $analyse->selectAll();
$listeSon=$son->selectAll();
?>
<fieldset>
	<legend>Ajouter une analyse :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutAnalyse', 'ajoutAnalyse', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="titre_analyse" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_analyse').'</div>';
	echo '<div class="form-group row"><label for="desc_analyse" class="col-sm-2 col-form-label-sm">analyse :</label>'.$form->ChampTexteEnrichi('desc_analyse').'</div>';
	if($listeSon){
		echo 'Pour placer un son dans le texte mettez : &lt;music&gt; <br/>Et sélectionnez le titre que vous voulez entrer :<br>';
			echo '<div class="form-group row"><label for="num_son" class="col-sm-2 col-form-label-sm">Sons :</label>'.$form->menu('num_son', $listeSon,'num_son','titre_son').'</div>';
	}
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>