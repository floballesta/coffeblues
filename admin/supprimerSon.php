<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$son=new Son($db);
$unSon=$son->selectByNum($num);
$nb=$son->deleteOne($num);
unlink('./son/'.$unSon['lien_son']);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, contactez le webmestre<br>';
}

}
echo '<a href=indexAdmin.php?page=gestSon>Retour</a></div>';
?>