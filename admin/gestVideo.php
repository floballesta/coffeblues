<?php
require_once('./classes/listeClass.php');
$video=new Video($db);
$liste=$video->selectAll();
echo '<table class="table"><thead><tr><th>Titre de la video :</th><th></th><th></th></tr></thead><tbody>';
foreach($liste as $unvideo)
{
echo '<tr><td>'.$unvideo['titre_video'].'</td><td><a class="btn btn-info" href=indexAdmin.php?page=modifierVideo&id='.$unvideo['num_video'].'>Modifier</a></td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerVideo&id='.$unvideo['num_video'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
