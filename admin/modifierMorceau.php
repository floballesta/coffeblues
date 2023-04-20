<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$morceau=new Morceau($db);

if (isset($_POST['btEnvoyer'])){
    $num_morceau=$_POST['num_morceau'];
    $titre_morceau=$_POST['titre_morceau'];
	$desc_morceau=$_POST['desc_morceau'];
	$desc_morceau_save=$_POST['desc_morceau_save'];
    $lien_morceau=$_POST['lien_morceau'];
    if($desc_morceau==''){
        $desc_morceau = $desc_morceau_save;
	}
	if ($desc_morceau!=null){
		$desc_morceau=str_replace('background-color: rgb(255, 255, 255)','',$desc_morceau);
	}
    if($lien_morceau != null)
	{
		if(strpos($lien_morceau, 'watch?v=') !== false){
			$lien = explode('watch?v=',$lien_morceau);
			$lien_morceau = 'https://www.youtube.com/embed/'.$lien[1];
		}
	}
    $modif=$morceau->updateAll($num_morceau,$titre_morceau,$desc_morceau,$lien_morceau);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue. Contacter le webmestre.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestMorceau>Retour</a></div>';
}
else{
$monMorceau=$morceau->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier un morceau :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierMorceau', 'modifierMorceau', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="desc_morceau_save" id="desc_morceau_save" value="'.htmlspecialchars($monMorceau['desc_morceau']).'">';
    echo '<input type=hidden name="num_morceau" id="num_morceau" value="'.$monMorceau['num_morceau'].'">';
	echo '<div class="form-group row"><label for="titre_morceau" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_morceau',$monMorceau['titre_morceau']).'</div>';
	echo '<div class="form-group row"><label for="desc_morceau" class="col-sm-2 col-form-label-sm">Description :</label>'.$form->ChampTexteEnrichi('desc_morceau',$monMorceau['desc_morceau']).'</div>';
	echo '<div class="form-group row"><label for="lien_morceau" class="col-sm-2 col-form-label-sm">Lien Youtube ou Facebook :</label>'.$form->ChampTexte('text', 'lien_morceau',$monMorceau['lien_morceau']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';
echo '<p><center><a href="./img/lien_facebook.png" target=_blank>Comment obtenir le lien Facebook ?</a></center>';
}
?>
