<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$film=new Film($db);
$nb=$film->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, assurez vous que le film n\'apparait plus dans les références films/artistes<br>';
}

}
echo '<a href=indexAdmin.php?page=gestFilm>Retour</a></div>';
?>