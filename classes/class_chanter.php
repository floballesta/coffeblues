<?php
class Chanter
{
	private $selectAll;
	private $selectByArtiste;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM chanter ORDER BY num_artiste');
		$this->selectByArtiste = $db->prepare('SELECT * FROM chanter WHERE num_artiste = :num_artiste');
		$this->insertAll = $db->prepare('INSERT INTO chanter(num_morceau, num_artiste) VALUES(:num_morceau, :num_artiste)');
		$this->deleteOne = $db->prepare('DELETE FROM chanter WHERE num_artiste = :num_artiste AND num_morceau = :num_morceau');
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
	public function insertAll($num_morceau, $num_artiste)
	{
		$this->insertAll->execute(array(':num_morceau' => $num_morceau, ':num_artiste' => $num_artiste));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_artiste, $num_morceau)
	{
		$this->deleteOne->execute(array(':num_artiste' => $num_artiste, ':num_morceau' => $num_morceau));
		return $this->deleteOne->rowCount();
	}
} 
?>