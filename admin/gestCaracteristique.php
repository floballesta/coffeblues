<?php
require_once('./classes/listeClass.php');
$caracteristique=new Caracteristique($db);
$liste=$caracteristique->selectAll();
echo '<table class="table"><thead><tr><th>Titre de la caracteristique</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $unecaracteristique)
{
echo '<tr><td>'.$unecaracteristique['titre_caracteristique'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierCaracteristique&id='.$unecaracteristique['num_caracteristique'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerCaracteristique&id='.$unecaracteristique['num_caracteristique'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
