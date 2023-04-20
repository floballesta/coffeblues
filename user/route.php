<?php require_once('./classes/listeClass.php');
$ville = new Ville($db);
$listeVille = $ville->selectAll();
//----------------------------------------------

echo '<div class="container text-light text-center">
  <img class="img-fluid" src="img/route61.jpg" alt="Workplace" usemap="#workmap">
  <map name="workmap">';

foreach($listeVille as $uneVille){
	echo '<area shape="rect" coords="'.$uneVille['zone_ville'].'" alt="'.$uneVille['nom_ville'].'" href="index.php?page=uneville&id='.$uneVille['num_ville'].'" class="x">';
} 
echo '</map>	

<script>
var areas = document.getElementsByTagName( "area" );
for( var index = 0; index < areas.length; index++ ) {    
    areas[index].addEventListener( "mouseover", function () {this.focus();}, false );
    areas[index].addEventListener( "mouseout", function () {this.blur();}, false );
};
</script>
<center><b><u>Liste des villes :</u></b><br />';
foreach($listeVille as $uneVille){
	echo '- '.$uneVille['nom_ville'].'<br />';
} 
echo '</center></div></div>';
?>