<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$blues = new Blues($db);
$son=new Son($db);
$listeSon=$son->selectAll();

if (isset($_POST['btEnvoyer'])){
    $num_blues=$_POST['num_blues'];
    $titre_blues=$_POST['titre_blues'];
    $desc_blues=$_POST['desc_blues'];
    $desc_blues_save=$_POST['desc_blues_save'];
    //$position=$_POST['position'];
	$position=null;
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($desc_blues==''){
        $desc_blues = $desc_blues_save;
    }
    if ($desc_blues!=null){
		$desc_blues=str_replace('background-color: rgb(255, 255, 255)','',$desc_blues);
	}
    if(strpos($desc_blues, '&lt;music&gt;') !== false){
		$num_son = $_POST['num_son'];
		$lien = explode('&lt;music&gt;',$desc_blues);
		$unSon=$son->selectByNum($num_son);
		$desc_blues=$lien[0].'<audio controls src="./son/'.$unSon['lien_son'].'"></audio>'.$lien[1];
	}
    $modif=$blues->updateAll($num_blues,$titre_blues,$desc_blues,$position);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestblues>Retour</a></div>';
}
else{
$monblues=$blues->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier une blues :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierBlues', 'modifierBlues', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="desc_blues_save" id="desc_blues_save" value="'.htmlspecialchars($monblues['desc_blues']).'">';
    echo '<input type=hidden name="num_blues" id="num_blues" value="'.$monblues['num_blues'].'">';
    echo '<div class="form-group row"><label for="titre_blues" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_blues',$monblues['titre_blues']).'</div>';
	echo '<div class="form-group row"><label for="desc_blues" class="col-sm-2 col-form-label-sm">blues :</label>'.$form->ChampTexteEnrichi('desc_blues',$monblues['desc_blues']).'</div>';
	//echo '<div class="form-group row"><label for="position" class="col-sm-2 col-form-label-sm">Position :</label>'.$form->ChampTexte('text', 'position',$monblues['position']).'</div>';
	if($listeSon){
		echo 'Pour placer un son dans le texte mettez : &lt;music&gt; <br/>Et sélectionnez le titre que vous voulez entrer :<br>';
			echo '<div class="form-group row"><label for="num_son" class="col-sm-2 col-form-label-sm">Sons :</label>'.$form->menu('num_son', $listeSon,'num_son','titre_son').'</div>';
	}
    echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}

?>