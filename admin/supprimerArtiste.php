<?php
require_once('./classes/listeClass.php');
if (isset($_GET['id'])){
 $num = $_GET['id'];

$artriste=new Artiste($db);
$nb=$artriste->deleteOne($num);
if ($nb==1){
    echo '<div class="text-center">La suppression a bien été réalisée<br>';
}
else{
    echo '<div class="text-center">Une erreur est survenue, assurez vous que l\'artiste n\'apparait plus dans les références films/artistes ou dans les liens histoires/artistes.<br>';
}

}
echo '<a href=indexAdmin.php?page=gestArtiste>Retour</a></div>';
?>