<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
    $nom_ville=$_POST['nom_ville'];
    $desc_ville=$_POST['desc_ville'];
    $zone_ville=$_POST['zone_ville'];
	if ($desc_ville!=null){
		$desc_ville=str_replace('background-color: rgb(255, 255, 255)','',$desc_ville);
	}
	$insertville = new Ville($db);
	$nb = $insertville->insertAll($nom_ville, $desc_ville, $zone_ville);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'L\'ville a bien été enregistré.';
	}

}
?>
<fieldset>
	<legend>Ajouter une ville :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutVille', 'ajoutVille', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="nom_ville" class="col-sm-2 col-form-label-sm">Nom de la ville :</label>'.$form->ChampTexte('text', 'nom_ville').'</div>';
	echo '<div class="form-group row"><label for="desc_ville" class="col-sm-2 col-form-label-sm">Description :</label>'.$form->ChampTexteEnrichi('desc_ville').'</div>';
	echo '<div class="form-group row"><label for="zone_ville" class="col-sm-2 col-form-label-sm">Zone image :</label>'.$form->ChampTexte('text', 'zone_ville','','','','','','x1,y1,x2,y2').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>
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