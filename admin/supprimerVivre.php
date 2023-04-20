<?php
require_once('./classes/listeClass.php');
if (isset($_GET['idA'])){
    if (isset($_GET['idV'])){
        $idA = $_GET['idA'];
        $idV = $_GET['idV'];

        $vivre=new Vivre($db);
        $nb=$vivre->deleteOne($idV,$idA);
        if ($nb==1){
            echo '<div class="text-center">La suppression a bien été réalisée<br>';
        }
        else{
            echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
        }
    }
}
echo '<a href=indexAdmin.php?page=gestVivre>Retour</a></div>';
?>