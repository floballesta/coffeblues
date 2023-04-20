<?php
class Vivre
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM vivre ORDER BY num_ville');
		$this->selectByTitre = $db->prepare('SELECT * FROM vivre WHERE num_ville = :num_ville');
		$this->insertAll = $db->prepare('INSERT INTO vivre(num_ville, num_artiste) VALUES(:num_ville, :num_artiste)');
		$this->deleteOne = $db->prepare('DELETE FROM vivre WHERE num_ville = :num_ville AND num_artiste = :num_artiste');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_ville)
	{
		$this->selectByTitre->execute(array(':num_ville' => $num_ville));
		return $this->selectByTitre->fetchAll();
	}
	public function insertAll($num_ville, $num_artiste)
	{
		$this->insertAll->execute(array(':num_ville' => $num_ville, ':num_artiste' => $num_artiste));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_ville, $num_artiste)
	{
		$this->deleteOne->execute(array(':num_ville' => $num_ville, ':num_artiste' => $num_artiste));
		return $this->deleteOne->rowCount();
	}
} 
?>