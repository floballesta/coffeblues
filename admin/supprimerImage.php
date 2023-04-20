<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
    $num = $_GET['id'];

    $image=new Image_ville($db);
    $uneImg=$image->selectByNum($num);
    $nb=$image->deleteOne($num);
    unlink('./images_ville/'.$uneImg['lien_image']);
    if ($nb==1){
        echo '<div class="text-center">La suppression a bien été réalisée<br>';
    }
    else{
        echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
    }
}
echo '<a href=indexAdmin.php?page=gestImage>Retour</a></div>';
?>