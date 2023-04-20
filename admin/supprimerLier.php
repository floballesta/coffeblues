<?php
require_once('./classes/listeClass.php');
if (isset($_GET['idH'])){
    if (isset($_GET['idA'])){
        $idH = $_GET['idH'];
        $idA = $_GET['idA'];

        $lier=new Lier($db);
        $nb=$lier->deleteOne($idH,$idA);
        if ($nb==1){
            echo '<div class="text-center">La suppression a bien été réalisée<br>';
        }
        else{
            echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
        }
    }
}
echo '<a href=indexAdmin.php?page=gestLier>Retour</a></div>';
?>