<?php
class Blues
{
	private $selectAll;
	private $selectAllOrder;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM blues');
		$this->selectAllOrder = $db->prepare('SELECT * FROM blues ORDER BY postion');
		$this->selectByTitre = $db->prepare('SELECT * FROM blues WHERE num_blues = :num_blues');
		$this->insertAll = $db->prepare('INSERT INTO blues(titre_blues, desc_blues, position) VALUES(:titre_blues, :desc_blues, :position)');
		$this->updateAll = $db->prepare('UPDATE blues SET titre_blues=:titre_blues,desc_blues=:desc_blues,position=:position WHERE num_blues=:num_blues');
		$this->deleteOne = $db->prepare('DELETE FROM blues WHERE num_blues = :num_blues');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectAllOrder()
	{
		$this->selectAllOrder->execute();
		return $this->selectAllOrder->fetchAll();
	}
	public function selectByTitre($num_blues)
	{
		$this->selectByTitre->execute(array(':num_blues' => $num_blues));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($titre_blues, $desc_blues, $position)
	{
		$this->insertAll->execute(array(':titre_blues' => $titre_blues, ':desc_blues' => $desc_blues, ':position' => $position));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_blues, $titre_blues, $desc_blues, $position)
	{
	$this->updateAll->execute(array(':num_blues'=>$num_blues,':titre_blues'=>$titre_blues,':desc_blues'=>$desc_blues, ':position'=>$position));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_blues)
	{
		$this->deleteOne->execute(array(':num_blues' => $num_blues));
		return $this->deleteOne->rowCount();
	}
} ?>