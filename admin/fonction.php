<?php
function testerChamp($var, $message)
{
	$valeur = null;
	if(isset($_POST[$var]))
	{
		if(empty($_POST[$var]))
		{
			echo $message;
		}
		else
		{
			$valeur = $_POST[$var];
		}
	}
	return $valeur;
}