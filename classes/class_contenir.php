<?php
class Contenir
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM contenir ORDER BY num_ville');
		$this->selectByTitre = $db->prepare('SELECT * FROM contenir WHERE num_ville = :num_ville');
		$this->insertAll = $db->prepare('INSERT INTO contenir(num_ville, num_histoire) VALUES(:num_ville, :num_histoire)');
		$this->deleteOne = $db->prepare('DELETE FROM contenir WHERE num_ville = :num_ville AND num_histoire = :num_histoire');
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
	public function insertAll($num_ville, $num_histoire)
	{
		$this->insertAll->execute(array(':num_ville' => $num_ville, ':num_histoire' => $num_histoire));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_ville, $num_histoire)
	{
		$this->deleteOne->execute(array(':num_ville' => $num_ville, ':num_histoire' => $num_histoire));
		return $this->deleteOne->rowCount();
	}
} 
?>