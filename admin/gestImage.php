<?php
require_once('./classes/listeClass.php');
$image=new Image_ville($db);
$liste=$image->selectAll();
echo '<table class="table"><thead><tr><th>Titre de l\'image</th><th>Ville</th><th></th></tr></thead><tbody>';
foreach($liste as $uneimage)
{
    $ville=new Ville($db);
    $laville=$ville->selectByTitre($uneimage['num_ville']);
echo '<tr><td><div id="mesimages"><img class="img-thumbnail" src="./images_ville/'.$uneimage['lien_image'].'"></div></td><td>'.$laville['nom_ville'].'</td><td><a class="btn btn-info" onclick="return window.confirm(\'Etes-vous sur?\');" href=indexAdmin.php?page=supprimerImage&id='.$uneimage['num_image'].'>Supprimer</a></td></tr>';
}
echo '</tbody></table>';
?>
