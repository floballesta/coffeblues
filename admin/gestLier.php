<?php
require_once('./classes/listeClass.php');
$lier=new Lier($db);
$listeLier=$lier->selectAll();
echo '<table class="table"><thead><tr><th>Titre de l\'histoire</th><th>Nom de l\'artiste</th><th></th></tr></thead><tbody>';
foreach($listeLier as $unLien)
{
    $histoire = new Histoire($db);
    $uneHistoire = $histoire->selectByTitre($unLien['num_histoire']);
    $artiste = new Artiste($db);
    $unArtiste = $artiste->selectByTitre($unLien['num_artiste']);
echo '<tr><td>'.$uneHistoire['titre_histoire'].'</td><td>'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerLier&idH='.$unLien['num_histoire'].'&idA='.$unLien['num_artiste'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
