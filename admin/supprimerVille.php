<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$ville=new Ville($db);
$nb=$ville->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, assurez vous que la ville n\'apparait pas dans un lien.<br>';
}

}
echo '<a href=indexAdmin.php?page=gestVille>Retour</a></div>';
?>