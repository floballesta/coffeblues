<?php
require_once('./classes/listeClass.php');
if (isset($_GET['idA'])){
    if (isset($_GET['idM'])){
        $idA = $_GET['idA'];
        $idM = $_GET['idM'];

        $chanter=new Chanter($db);
        $nb=$chanter->deleteOne($idA,$idM);
        if ($nb==1){
            echo '<div class="text-center">La suppression a bien été réalisée<br>';
        }
        else{
            echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
        }
    }
}
echo '<a href=indexAdmin.php?page=gestChanter>Retour</a></div>';
?>