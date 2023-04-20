<?php
require_once('./classes/listeClass.php');
$film=new Film($db);
$liste=$film->selectAll();
echo '<table class="table"><thead><tr><th>Nom du film</th><th>Modifier</th><th>Supprimer</th></tr></thead><tbody>';
foreach($liste as $unFilm)
{
echo '<tr><td>'.$unFilm['titre_film'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierFilm&id='.$unFilm['num_film'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerFilm&id='.$unFilm['num_film'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
