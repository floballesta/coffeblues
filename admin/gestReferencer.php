<?php
require_once('./classes/listeClass.php');
$referencer=new Referencer($db);
$listeReferencer=$referencer->selectAll();
echo '<table class="table"><thead><tr><th>Titre du film</th><th>Nom de l\'artiste</th><th></th></tr></thead><tbody>';
foreach($listeReferencer as $uneReference)
{
    $film = new Film($db);
    $unFilm = $film->selectByTitre($uneReference['num_film']);
    $artiste = new Artiste($db);
    $unArtiste = $artiste->selectByTitre($uneReference['num_artiste']);
echo '<tr><td>'.$unFilm['titre_film'].'</td><td>'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerLier&idF='.$uneReference['num_film'].'&idA='.$uneReference['num_artiste'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
