<?php
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
$id=$_GET['id'];
$ville=new Ville($db);

if (isset($_POST['btEnvoyer'])){
    $num_ville=$_POST['num_ville'];
    $nom_ville=$_POST['nom_ville'];
    $desc_ville=$_POST['desc_ville'];
    $desc_ville_save=$_POST['desc_ville_save'];
    $zone_ville=$_POST['zone_ville'];
    //s'il n'y a pas eu de modif dans le richtexteditor on garde celui de sauvegarde
    if($desc_ville==''){
        $desc_ville = $desc_ville_save;
    }
    if ($desc_ville!=null){
		$desc_ville=str_replace('background-color: rgb(255, 255, 255)','',$desc_ville);
	}
    $modif=$ville->updateAll($num_ville,$nom_ville,$desc_ville,$zone_ville);
    if ($modif==1){
        echo '<div class="text-center">La modification a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, vérifiez que vous ayez bien modifié les champs.<br>';
    }
    echo '<a href=indexAdmin.php?page=gestVille>Retour</a></div>';
}
else{
$maville=$ville->selectByTitre($id);
echo '<fieldset>
	<legend>Modifier une ville :</legend>';
	$form = new Formulaire('indexAdmin.php?page=modifierVille', 'modifierVille', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<input type=hidden name="desc_ville_save" id="desc_ville_save" value="'.htmlspecialchars($maville['desc_ville']).'">';
    echo '<input type=hidden name="num_ville" id="num_ville" value="'.$maville['num_ville'].'">';
	echo '<div class="form-group row"><label for="nom_ville" class="col-sm-2 col-form-label-sm">Nom ville :</label>'.$form->ChampTexte('text', 'nom_ville',$maville['nom_ville']).'</div>';
	echo '<div class="form-group row"><label for="desc_ville" class="col-sm-2 col-form-label-sm">Description :</label>'.$form->ChampTexteEnrichi('desc_ville',$maville['desc_ville']).'</div>';
	echo '<div class="form-group row"><label for="zone_ville" class="col-sm-2 col-form-label-sm">Zone ville :</label>'.$form->ChampTexte('text','zone_ville', $maville['zone_ville']).'</div>';
	echo $form->Bouton('btEnvoyer', 'Modifier');
	echo $form->fin();
echo '</fieldset>';

}
?>
<div class="lien"><center>
Pour ajouter les coordonnées d'une ville :<br>
- Télécharger l'image de la route 61 : <a href="http://coffeeblues.aubanel.fr/img/route61.jpg" download="route61">Télécharger l'image</a><br>
- Aller sur le site <a href='https://www.image-map.net' target="_blank">https://www.image-map.net/</a><br>
- Sélectionner l'image à partir du PC et ajouter l'image "route61.jpg"<br>
- Cliquer sur la ville dans l'image afin de faire apparaitre le carré qui va entourer la ville<br>
- Cliquer sur le bouton en bas "Show me the code"<br>
- Copier les coordonnées comme indiqué dans la capture d'écran ci-dessous.<br>
<img src="./img/showmecode.png" id="img-affiche">
</center></div>
