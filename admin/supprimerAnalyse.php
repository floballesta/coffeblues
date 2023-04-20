<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$analyse=new analyse($db);
$nb=$analyse->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, contactez le webmestre.<br>';
}

}
echo '<a href=indexAdmin.php?page=gestAnalyse>Retour</a></div>';
?>