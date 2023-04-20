<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$analyse=new Analyse($db);
$son=new Son($db);
$listeSon=$son->selectAll();

if (isset($_POST['btEnvoyer'])){
    $num_analyse=$_POST['num_analyse'];
    $titre_analyse=$_POST['titre_analyse'];
    $desc_analyse=$_POST['desc_analyse'];
    $desc_analyse_save=$_POST['desc_analyse_save'];
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($desc_analyse==''){
        $desc_analyse = $desc_analyse_save;
    }
    if ($desc_analyse!=null){
		$desc_analyse=str_replace('background-color: rgb(255, 255, 255)','',$desc_analyse);
	}
    if(strpos($desc_analyse, '&lt;music&gt;') !== false){
		$num_son = $_POST['num_son'];
		$lien = explode('&lt;music&gt;',$desc_analyse);
		$unSon=$son->selectByNum($num_son);
		$desc_analyse=$lien[0].'<audio controls src="./son/'.$unSon['lien_son'].'"></audio>'.$lien[1];
	}
    $modif=$analyse->updateAll($num_analyse,$titre_analyse,$desc_analyse);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestAnalyse>Retour</a></div>';
}
else{
$monanalyse=$analyse->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier une analyse :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierAnalyse', 'modifierAnalyse', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="desc_analyse_save" id="desc_analyse_save" value="'.htmlspecialchars($monanalyse['desc_analyse']).'">';
    echo '<input type=hidden name="num_analyse" id="num_analyse" value="'.$monanalyse['num_analyse'].'">';
	echo '<div class="form-group row"><label for="titre_analyse" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_analyse',$monanalyse['titre_analyse']).'</div>';
	echo '<div class="form-group row"><label for="desc_analyse" class="col-sm-2 col-form-label-sm">analyse :</label>'.$form->ChampTexteEnrichi('desc_analyse',$monanalyse['desc_analyse']).'</div>';
	if($listeSon){
		echo 'Pour placer un son dans le texte mettez : &lt;music&gt; <br/>Et sélectionnez le titre que vous voulez entrer :<br>';
			echo '<div class="form-group row"><label for="num_son" class="col-sm-2 col-form-label-sm">Sons :</label>'.$form->menu('num_son', $listeSon,'num_son','titre_son').'</div>';
	}
    echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
