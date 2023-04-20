<?php
require_once('./classes/listeClass.php');
if (isset($_GET['idH'])){
    if (isset($_GET['idV'])){
        $idH = $_GET['idH'];
        $idV = $_GET['idV'];

        $comporter=new Comporter($db);
        $nb=$comporter->deleteOne($idH,$idV);
        if ($nb==1){
            echo '<div class="text-center">La suppression a bien été réalisée<br>';
        }
        else{
            echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
        }
    }
}
echo '<a href=indexAdmin.php?page=gestComporter>Retour</a></div>';
?>