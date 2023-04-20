<?php require_once('user/entete.php');
require_once('user/menu.php');
echo '<div id="corps">';
if(isset($_GET['page']))
{
	$page = $_GET['page'].'.php';
	if(file_exists('./user/'.$page))
		require_once('./user/'.$page);
	else
		echo '<conteneur><img class="img-fluid" src="./img/EnConstruction.png" id="imgConstruct"></conteneur>';
}
else{
$files = glob("./img/blues*.*");
$compteur = count($files);
  echo '
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">';
  for($i=0;$i<$compteur;++$i){
    if($i==0){
      echo '<li data-target="#demo" data-slide-to="'.$i.'" class="active"></li>';
    }else{
      echo '<li data-target="#demo" data-slide-to="'.$i.'"></li>';
    } 
  }
 echo '</ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">';
  for($i=0;$i<$compteur;++$i){
    if($i==0){
      echo '<div class="carousel-item active">
      <img class="img-fluid" src="./img/blues'.($i+1).'.jpg" width="1100" height="500"></div>';
    }else{
      echo '<div class="carousel-item">
      <img class="img-fluid" src="./img/blues'.($i+1).'.jpg" width="1100" height="500"></div>';
    } 
  }
  echo '</div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div></div></div>';
}
require_once('user/bas.php'); 
?>