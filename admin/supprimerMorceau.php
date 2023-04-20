<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$morceau=new Morceau($db);
$nb=$morceau->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, contacter le webmestre.<br>';
}

}
echo '<a href=indexAdmin.php?page=gestMorceau>Retour</a></div>';
?>