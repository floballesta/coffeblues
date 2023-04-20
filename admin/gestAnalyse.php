<?php
require_once('./classes/listeClass.php');
$analyse=new Analyse($db);
$liste=$analyse->selectAll();
echo '<table class="table"><thead><tr><th>Titre de l\'analyse</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $uneanalyse)
{
echo '<tr><td>'.$uneanalyse['titre_analyse'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierAnalyse&id='.$uneanalyse['num_analyse'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerAnalyse&id='.$uneanalyse['num_analyse'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
