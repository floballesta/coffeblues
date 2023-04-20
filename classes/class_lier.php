<?php
class Lier
{
	private $selectAll;
	private $selectByHistoire;
	private $selectByArtiste;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM lier ORDER BY num_histoire');
		$this->selectByHistoire = $db->prepare('SELECT * FROM lier WHERE num_histoire = :num_histoire');
		$this->selectByArtiste = $db->prepare('SELECT * FROM lier WHERE num_artiste = :num_artiste');
		$this->insertAll = $db->prepare('INSERT INTO lier(num_histoire, num_artiste) VALUES(:num_histoire, :num_artiste)');
		$this->deleteOne = $db->prepare('DELETE FROM lier WHERE num_histoire = :num_histoire AND num_artiste = :num_artiste');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByHistoire($num_histoire)
	{
		$this->selectByHistoire->execute(array(':num_histoire' => $num_histoire));
		return $this->selectByHistoire->fetchAll();
	}
	public function selectByArtiste($num_artiste)
	{
		$this->selectByArtiste->execute(array(':num_artiste' => $num_artiste));
		return $this->selectByArtiste->fetchAll();
	}
	public function insertAll($num_histoire, $num_artiste)
	{
		$this->insertAll->execute(array(':num_histoire' => $num_histoire, ':num_artiste' => $num_artiste));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_histoire, $num_artiste)
	{
		$this->deleteOne->execute(array(':num_histoire' => $num_histoire, ':num_artiste' => $num_artiste));
		return $this->deleteOne->rowCount();
	}
} 
?>