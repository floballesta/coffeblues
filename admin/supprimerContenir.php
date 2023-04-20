<?php
require_once('./classes/listeClass.php');
if (isset($_GET['idH'])){
    if (isset($_GET['idV'])){
        $idH = $_GET['idH'];
        $idV = $_GET['idV'];

        $contenir=new Contenir($db);
        $nb=$contenir->deleteOne($idV,$idH);
        if ($nb==1){
            echo '<div class="text-center">La suppression a bien été réalisée<br>';
        }
        else{
            echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
        }
    }
}
echo '<a href=indexAdmin.php?page=gestContenir>Retour</a></div>';
?>