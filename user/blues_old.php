<?php require_once('./classes/listeClass.php');
$blues = new Blues($db);
$listeblues = $blues->selectAll();

//----------------------------------------------

echo '<div class="container">
<div class="row text-center">
			<div class="col">
				<span class="text-white font-weight-bold h3">L\'histoire du Blues</span>
			</div>
		</div>
<p></p>';

foreach($listeblues as $unblues){
	echo '<div class="row"><div class="panel">
			<div class="panel-heading text-white">
				<h3 class="pull-left">
					'.$unblues['titre_blues'].'
				</h3>
			</div>
			<div class="panel-body text-light text-justify">
			'.$unblues['desc_blues'].'
			</div>
			<div class="panel-footer">
			</div>
		  </div></div><p></p>';
} 
echo '</div>';
?>