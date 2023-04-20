<?php require_once('./classes/listeClass.php');
$musicologie = new musicologie($db);
$listemusicologie = $musicologie->selectAll();

//----------------------------------------------

echo '<div class="container">
';

foreach($listemusicologie as $unmusicologie){
	echo '<div class="row"><div class="panel">
			<div class="panel-heading text-white">
				<h3 class="pull-left">
					'.$unmusicologie['titre_musicologie'].'
				</h3>
			</div>
			<div class="panel-body text-light text-justify">
			'.$unmusicologie['desc_musicologie'].'
			</div>
			<div class="panel-footer">
			</div>
		  </div></div><p></p>';
} 
echo '</div>';
?>