<?php
require_once('./classes/listeClass.php');
$son=new Son($db);
$liste=$son->selectAll();
echo '<table class="table"><thead><tr><th>Titre audio :</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $unson)
{
echo '<tr><td>'.$unson['titre_son'].'</td><td><audio controls src="./son/'.$unson['lien_son'].'"></audio></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerSon&id='.$unson['num_son'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
