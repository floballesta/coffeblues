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
			echo '<img class="myImg img-thumbnail" src="./images_ville/'.$uneImage['lien_image'].'">';
}				
echo '		</div></div>
		</div>
		</div>';
}
/*echo '<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	</div>
	<div class="modal-body">
	  <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
	</div>
	<div class="modal-footer">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
  </div>
</div>
</div>';*/
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
<?php
echo '<div class="container"><div class="row">';
echo '</div></div></div></div>';
//<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-code">Show Me The Code!</button>
//<div class="modal fade" id="modal-code" tabindex="-1" role="dialog" aria-labelledby="modal-code-label" aria-hidden="true"><div class="modal-dialog"><div class="modal-content" id="modal-code-dialog"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="modal-code-label">Generated Image Map Output</h4></div><div class="modal-body"><textarea class="form-control input-sm" readonly="readonly" id="modal-code-result" rows="10"></textarea></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>
?>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = $("#img01");
//var captionText = document.getElementById("caption");
$('.myImg').click(function(){
	//var img = $('.myImg');
    modal.style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    //captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
//$("#pop").on("click", function() {
//   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
//   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
//});
</script>