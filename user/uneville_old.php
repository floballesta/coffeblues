<?php require_once('./classes/listeClass.php');
$ville = new Ville($db);
$unville = $ville->selectByTitre($_GET['id']);
$image=new Image_ville($db);
$listeImage=$image->selectByTitre($_GET['id']);
$contenir = new Contenir($db);
$listeContenir = $contenir->selectByTitre($_GET['id']);
$vivre = new Vivre($db);
$listeVivre = $vivre->selectByTitre($_GET['id']);
//----------------------------------------------
echo '<div class="container-fluid">
		<div class="row text-center">
			<div class="col">
				<span class="text-white font-weight-bold h3">'.$unville['nom_ville'].'</span>
			</div>
		</div>
		<p><hr>
		<div class="row">
			<div class="col-md-6">';
			if(!empty($listeContenir)){
				echo '<div class="text-light"><h4><u>Ses histoires :</u></h4></div><br />
						<ul>';
						foreach($listeContenir as $unCont)
						{
							$histoire = new Histoire($db);
							$uneHistoire = $histoire->selectByTitre($unCont['num_histoire']);
						echo '<li><a href="index.php?page=unehistoire&id='.$uneHistoire['num_histoire'].'">'.$uneHistoire['titre_histoire'].'</a></li>';
						}
						echo '</ul>';
					echo '';
			}
			if(!empty($listeVivre)){
				echo '<p><div class="text-light"><h4><u>Ses bluesmen :</u></h4></div>
						<ul>';
						foreach($listeVivre as $uneVie)
						{
							$artiste = new Artiste($db);
							$unArtiste = $artiste->selectByTitre($uneVie['num_artiste']);
						echo '<li><a href="index.php?page=unartiste&id='.$unArtiste['num_artiste'].'">'.$unArtiste['prenom_artiste'].' '.$unArtiste['nom_artiste'].'</a></li>';
						}
						echo '</ul>';
					echo '</p><p>';
			}
echo '			<div class="text-white text-justify">'.$unville['desc_ville'].'</div>
			</div>';
if(!empty($listeImage)){
	echo '<div class="col-md-6">
	<div id="mesimages" class="text-center bordure bg-light">';
		foreach($listeImage as $uneImage){
			echo '<img class="img-thumbnail" src="./images_ville/'.$uneImage['lien_image'].'">';
}				
echo '		</div></div>
		</div>
		</div>';
}
echo '<div class="container"><div class="row">';

echo '</div></div></div></div>';
//<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-code">Show Me The Code!</button>
//<div class="modal fade" id="modal-code" tabindex="-1" role="dialog" aria-labelledby="modal-code-label" aria-hidden="true"><div class="modal-dialog"><div class="modal-content" id="modal-code-dialog"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="modal-code-label">Generated Image Map Output</h4></div><div class="modal-body"><textarea class="form-control input-sm" readonly="readonly" id="modal-code-result" rows="10"></textarea></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>
?>