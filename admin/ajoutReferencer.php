<?php 
require_once('./classes/listeClass.php');
require_once('./classes/class_upload.php');
if($_POST['btAjouter'] != null)
{
	$num_film=$_POST['num_film'];
    $num_artiste=$_POST['num_artiste'];
    
	$insertReferencer = new Referencer($db);
	$nb = $insertReferencer->insertAll($num_film, $num_artiste);
	if($nb != 1)
	{
		echo 'Erreur de l\'insertion.';
	}
	else
	{
		echo 'La référence a bien été enregistrée.';
	}
}
$film = new Film($db);
$listeFilm = $film->selectAll();
$artiste = new Artiste($db);
$listeArtiste = $artiste->selectAll();
?>
<fieldset>
	<legend>Ajouter une référence d'un film à un artiste :</legend>
	<?php 
	$form = new Formulaire('indexAdmin.php?page=ajoutReferencer', 'ajoutReferencer', 'post','','multipart/form-data');
	echo $form->startForm();
	echo '<div class="form-group row"><label for="num_film" class="col-sm-2 col-form-label-sm">film :</label>'.$form->menu('num_film', $listeFilm,'num_film','titre_film').'</div>';
	echo '<div class="form-group row"><label for="num_artiste" class="col-sm-2 col-form-label-sm">Artiste :</label>'.$form->menu('num_artiste', $listeArtiste,'num_artiste','prenom_artiste','nom_artiste').'</div>';
	echo $form->Bouton('btAjouter', 'Ajouter');
	echo $form->fin(); ?>
</fieldset>