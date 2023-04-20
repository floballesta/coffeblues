<?php require_once('admin/entete.php');
require_once('admin/menu.php');
echo '<div id="corps">';
echo '<main class="container">';
if(isset($_GET['page']))
{
	$page = $_GET['page'].'.php';
	if(file_exists('./admin/'.$page))
		require_once('./admin/'.$page);
	else
		echo 'Cette page n\'existe pas.';
}
else {
	echo '<div class="text-center"><h1>Page d\'administration</h1></div>';
	require_once('./classes/listeClass.php');
	$artiste = new Artiste($db);
	$listeArtiste = $artiste->selectAll();
	$histoire = new Histoire($db);
	$listeHistoire = $histoire->selectAll();
	$ouvrage=new Ouvrage($db);
	$listeOuvrage=$ouvrage->selectAll();
	$film=new Film($db);
	$listeFilm=$film->selectAll();
	$lier=new Lier($db);
	$listeLier=$lier->selectAll();
	$referencer=new Referencer($db);
	$listeReferencer=$referencer->selectAll();
	$morceau=new Morceau($db);
	$listeMorceau=$morceau->selectAll();
	$comporter=new Comporter($db);
	$listeComporter=$comporter->selectAll();
	$composer=new Composer($db);
	$listeComposer=$composer->selectAll();
	$video=new Video($db);
	$listeVideo=$video->selectAll();
	$ville=new Ville($db);
	$listeVille=$ville->selectAll();
	$vivre=new Vivre($db);
	$listeVivre=$vivre->selectAll();
	$contenir=new Contenir($db);
	$listeContenir=$contenir->selectAll();
	$image_ville=new Image_ville($db);
	$listeImage=$image_ville->selectAll();
	$son=new Son($db);
	$listeSon=$son->selectAll();
	echo '<table class="table table-sm"><thead><tr><th>Catégories</th><th>Nombre d\'enregistrement</th></tr></thead>';
	echo '<tbody><tr><td>Artiste</td><td>'.count($listeArtiste).'</td></tr>';
	echo '<tr><td>Histoire</td><td>'.count($listeHistoire).'</td></tr>';
	echo '<tr><td>Ouvrage</td><td>'.count($listeOuvrage).'</td></tr>';
	echo '<tr><td>Film</td><td>'.count($listeFilm).'</td></tr>';
	echo '<tr><td>Liens Histoires/Artistes</td><td>'.count($listeLier).'</td></tr>';
	echo '<tr><td>Références Films/Artistes</td><td>'.count($listeReferencer).'</td></tr>';
	echo '<tr><td>Morceaux</td><td>'.count($listeMorceau).'</td></tr>';
	echo '<tr><td>Comporter Histoire/Video</td><td>'.count($listeComporter).'</td></tr>';
	echo '<tr><td>Composer Artiste/Video</td><td>'.count($listeComposer).'</td></tr>';
	echo '<tr><td>Video</td><td>'.count($listeVideo).'</td></tr>';
	echo '<tr><td>Ville</td><td>'.count($listeVille).'</td></tr>';
	echo '<tr><td>Vivre Artiste/Ville</td><td>'.count($listeVivre).'</td></tr>';
	echo '<tr><td>Contenir Histoire/Ville</td><td>'.count($listeContenir).'</td></tr>';
	echo '<tr><td>Images de ville</td><td>'.count($listeImage).'</td></tr>';
	echo '<tr><td>Sons</td><td>'.count($listeSon).'</td></tr>';
	echo '<tbody></table>';
}
echo '</main></div>';
require_once('admin/bas.php'); ?>