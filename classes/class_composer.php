<?php
class Composer
{
	private $selectAll;
	private $selectByArtiste;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM composer ORDER BY num_artiste');
		$this->selectByArtiste = $db->prepare('SELECT * FROM composer WHERE num_artiste = :num_artiste');
		$this->insertAll = $db->prepare('INSERT INTO composer(num_artiste, num_video) VALUES(:num_artiste, :num_video)');
		$this->deleteOne = $db->prepare('DELETE FROM composer WHERE num_artiste = :num_artiste AND num_video = :num_video');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByArtiste($num_artiste)
	{
		$this->selectByArtiste->execute(array(':num_artiste' => $num_artiste));
		return $this->selectByArtiste->fetchAll();
	}
	public function insertAll($num_artiste, $num_video)
	{
		$this->insertAll->execute(array(':num_artiste' => $num_artiste, ':num_video' => $num_video));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_artiste, $num_video)
	{
		$this->deleteOne->execute(array(':num_artiste' => $num_artiste, ':num_video' => $num_video));
		return $this->deleteOne->rowCount();
	}
} 
?>