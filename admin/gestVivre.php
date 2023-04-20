<?php
require_once('./classes/listeClass.php');
$vivre=new Vivre($db);
$listevivre=$vivre->selectAll();
echo '<table class="table"><thead><tr><th>Artiste</th><th>Nom de la Ville</th><th></th></tr></thead><tbody>';
foreach($listevivre as $unVivre)
{
    $artiste = new Artiste($db);
    $unArtiste = $artiste->selectByTitre($unVivre['num_artiste']);
    $ville = new Ville($db);
    $unville = $ville->selectByTitre($unVivre['num_ville']);
echo '<tr><td>'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</td><td>'.$unville['nom_ville'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerVivre&idA='.$unVivre['num_artiste'].'&idV='.$unVivre['num_ville'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
