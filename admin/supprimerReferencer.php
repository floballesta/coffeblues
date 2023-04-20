<?php
require_once('./classes/listeClass.php');
if (isset($_GET['idF'])){
    if (isset($_GET['idA'])){
        $idF = $_GET['idF'];
        $idA = $_GET['idA'];

        $referencer=new Referencer($db);
        $nb=$referencer->deleteOne($idF,$idA);
        if ($nb==1){
            echo '<div class="text-center">La suppression a bien été réalisée<br>';
        }
        else{
            echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
        }
        
    }
}
echo '<a href=indexAdmin.php?page=gestReferencer>Retour</a></div>';
?>