<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
    //$lien_image=$_POST['lien_image'];
    $num_ville=$_POST['num_ville'];
	$photo = null;
	$upload = new Upload(array('png', 'gif', 'jpg', 'jpeg', 'webp'), 'images_ville', 4194304);
	$photo = $upload->enregistrer('photo');

	$insertImage = new Image_ville($db);
	$nb = $insertImage->insertAll($photo['nom'], $num_ville);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'L\'image de la ville a bien été enregistré.';
	}

}
$histoire = new Histoire($db);
$listeHistoire = $histoire->selectAll();
$Ville=new Ville($db);
$listeVille=$Ville->selectAll();
?>
<fieldset>
	<legend>Ajouter une histoire :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutImage', 'ajoutImage', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="lien_image" class="col-sm-2 col-form-label-sm">Image ville :</label><div class="custom-file col-sm-10"><input type="file" name="photo" id="photo" class="form-control"/></div></div>';
	echo '<div class="form-group row"><label for="num_ville" class="col-sm-2 col-form-label-sm">Ville :</label>'.$form->menu('num_ville', $listeVille,'num_ville','nom_ville').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>