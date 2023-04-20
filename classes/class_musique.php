<?php
class Musique
{
	private $selectAll;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM musique');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
} ?>