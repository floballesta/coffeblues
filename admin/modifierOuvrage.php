<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$ouvrage=new Ouvrage($db);

if (isset($_POST['btEnvoyer'])){
    $num_ouvrage=$_POST['num_ouvrage'];
    $ISBN=$_POST['ISBN'];
    $titre_ouvrage=$_POST['titre_ouvrage'];
    $theme_ouvrage=$_POST['theme_ouvrage'];
    $auteur_ouvrage=$_POST['auteur_ouvrage'];
    $editeur_ouvrage=$_POST['editeur_ouvrage'];

    $modif=$ouvrage->updateAll($num_ouvrage,$ISBN,$titre_ouvrage,$theme_ouvrage,$auteur_ouvrage,$editeur_ouvrage);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestOuvrage>Retour</a></div>';
}
else{
$monOuvrage=$ouvrage->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier un ouvrage :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierOuvrage', 'modifierOuvrage', 'post','','multipart/form-data');
    echo $form->startForm();
    echo '<input type=hidden name="num_ouvrage" id="num_ouvrage" value="'.$monOuvrage['num_ouvrage'].'">';
	echo '<div class="form-group row"><label for="ISBN" class="col-sm-2 col-form-label-sm">ISBN :</label>'.$form->ChampTexte('text', 'ISBN',$monOuvrage['ISBN']).'</div>';
	echo '<div class="form-group row"><label for="titre_ouvrage" class="col-sm-2 col-form-label-sm">Titre :</label>'.$form->ChampTexte('text', 'titre_ouvrage',$monOuvrage['titre_ouvrage']).'</div>';
	echo '<div class="form-group row"><label for="theme_ouvrage" class="col-sm-2 col-form-label-sm">Theme :</label>'.$form->ChampTexte('text', 'theme_ouvrage',$monOuvrage['theme_ouvrage']).'</div>';
	echo '<div class="form-group row"><label for="auteur_ouvrage" class="col-sm-2 col-form-label-sm">Auteur :</label>'.$form->ChampTexte('text', 'auteur_ouvrage',$monOuvrage['auteur_ouvrage']).'</div>';
	echo '<div class="form-group row"><label for="editeur_ouvrage" class="col-sm-2 col-form-label-sm">Editeur :</label>'.$form->ChampTexte('text', 'editeur_ouvrage',$monOuvrage['editeur_ouvrage']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
