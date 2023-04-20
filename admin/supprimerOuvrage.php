<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$ouvrage=new Ouvrage($db);
$nb=$ouvrage->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, assurez vous que l\'ouvrage n\'apparait pas dans une histoire.<br>';
}

}
echo '<a href=indexAdmin.php?page=gestOuvrage>Retour</a></div>';
?>