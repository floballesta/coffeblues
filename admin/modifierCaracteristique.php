<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$caracteristique=new Caracteristique($db);
$son=new Son($db);
$listeSon=$son->selectAll();

if (isset($_POST['btEnvoyer'])){
    $num_caracteristique=$_POST['num_caracteristique'];
    $titre_caracteristique=$_POST['titre_caracteristique'];
    $desc_caracteristique=$_POST['desc_caracteristique'];
    $desc_caracteristique_save=$_POST['desc_caracteristique_save'];
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($desc_caracteristique==''){
        $desc_caracteristique = $desc_caracteristique_save;
    }
    if ($desc_caracteristique!=null){
		$desc_caracteristique=str_replace('background-color: rgb(255, 255, 255)','',$desc_caracteristique);
	}
    if(strpos($desc_caracteristique, '&lt;music&gt;') !== false){
		$num_son = $_POST['num_son'];
		$lien = explode('&lt;music&gt;',$desc_caracteristique);
		$unSon=$son->selectByNum($num_son);
		$desc_caracteristique=$lien[0].'<audio controls src="./son/'.$unSon['lien_son'].'"></audio>'.$lien[1];
	}
    $modif=$caracteristique->updateAll($num_caracteristique,$titre_caracteristique,$desc_caracteristique);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestCaracteristique>Retour</a></div>';
}
else{
$moncaracteristique=$caracteristique->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier une caracteristique :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierCaracteristique', 'modifierCaracteristique', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="desc_caracteristique_save" id="desc_caracteristique_save" value="'.htmlspecialchars($moncaracteristique['desc_caracteristique']).'">';
    echo '<input type=hidden name="num_caracteristique" id="num_caracteristique" value="'.$moncaracteristique['num_caracteristique'].'">';
	echo '<div class="form-group row"><label for="titre_caracteristique" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_caracteristique',$moncaracteristique['titre_caracteristique']).'</div>';
	echo '<div class="form-group row"><label for="desc_caracteristique" class="col-sm-2 col-form-label-sm">caracteristique :</label>'.$form->ChampTexteEnrichi('desc_caracteristique',$moncaracteristique['desc_caracteristique']).'</div>';
	if($listeSon){
		echo 'Pour placer un son dans le texte mettez : &lt;music&gt; <br/>Et sélectionnez le titre que vous voulez entrer :<br>';
			echo '<div class="form-group row"><label for="num_son" class="col-sm-2 col-form-label-sm">Sons :</label>'.$form->menu('num_son', $listeSon,'num_son','titre_son').'</div>';
	}
    echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
