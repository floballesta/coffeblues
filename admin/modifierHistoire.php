<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$histoire=new Histoire($db);

if (isset($_POST['btEnvoyer'])){
    $num_histoire=$_POST['num_histoire'];
    $titre_histoire=$_POST['titre_histoire'];
    $desc_histoire=$_POST['desc_histoire'];
    $desc_histoire_save=$_POST['desc_histoire_save'];
    $num_ouvrage=$_POST['num_ouvrage'];
    $num_catblues=$_POST['num_catblues'];
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($desc_histoire==''){
        $desc_histoire = $desc_histoire_save;
    }
    if ($desc_histoire!=null){
		$desc_histoire=str_replace('background-color: rgb(255, 255, 255)','',$desc_histoire);
	}
    $modif=$histoire->updateAll($num_histoire,$titre_histoire,$desc_histoire,$num_ouvrage,$num_catblues);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestHistoire>Retour</a></div>';
}
else{
$monHistoire=$histoire->selectByTitre($id);
$ouvrage=new Ouvrage($db);
$listeOuvrage=$ouvrage->selectAll();
$catblues=new Catblues($db);
$listeCatblues=$catblues->selectAll();
echo '<fieldset>
	<legend>Modifier une histoire :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierHistoire', 'modifierHistoire', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="desc_histoire_save" id="desc_histoire_save" value="'.htmlspecialchars($monHistoire['desc_histoire']).'">';
    echo '<input type=hidden name="num_histoire" id="num_histoire" value="'.$monHistoire['num_histoire'].'">';
	echo '<div class="form-group row"><label for="titre_histoire" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_histoire',$monHistoire['titre_histoire']).'</div>';
	echo '<div class="form-group row"><label for="desc_histoire" class="col-sm-2 col-form-label-sm">Histoire :</label>'.$form->ChampTexteEnrichi('desc_histoire',$monHistoire['desc_histoire']).'</div>';
	echo '<div class="form-group row"><label for="num_ouvrage" class="col-sm-2 col-form-label-sm">Ouvrage :</label>'.$form->menu('num_ouvrage', $listeOuvrage,'num_ouvrage','titre_ouvrage','',$monHistoire['num_ouvrage']).'</div>';
	echo '<div class="msg form-group row"><label for="num_catblues" class="col-sm-2 col-form-label-sm">Catégorie Blues :</label>'.$form->menu('num_catblues', $listeCatblues,'num_catblues','titre_catblues','',$monHistoire['num_catblues']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
