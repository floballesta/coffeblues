<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$histoire=new Histoire($db);
$nb=$histoire->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, assurez vous que l\'histoire n\'apparait pas dans le lien histoire/artiste.<br>';
}

}
echo '<a href=indexAdmin.php?page=gestHistoire>Retour</a></div>';
?>