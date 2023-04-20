<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$video=new Video($db);
$nb=$video->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, est-elle liée à une histoire ?<br>';
}

}
echo '<a href=indexAdmin.php?page=gestVideo>Retour</a></div>';
?>