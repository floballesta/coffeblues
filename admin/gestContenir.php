<?php
require_once('./classes/listeClass.php');
$contenir=new Contenir($db);
$listecontenir=$contenir->selectAll();
echo '<table class="table"><thead><tr><th>Titre de l\'histoire</th><th>Nom de la ville</th><th></th></tr></thead><tbody>';
foreach($listecontenir as $unComp)
{
    $histoire = new Histoire($db);
    $uneHistoire = $histoire->selectByTitre($unComp['num_histoire']);
    $ville = new Ville($db);
    $unville = $ville->selectByTitre($unComp['num_ville']);
echo '<tr><td>'.$uneHistoire['titre_histoire'].'</td><td>'.$unville['nom_ville'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerContenir&idH='.$unComp['num_histoire'].'&idV='.$unComp['num_ville'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
