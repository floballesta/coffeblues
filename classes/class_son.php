<?php
class Son
{
	private $selectAll;
	private $selectByTitre;
	private $selectByNum;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM son');
		$this->selectByTitre = $db->prepare('SELECT * FROM son WHERE titre_son = :titre_son');
		$this->selectByNum = $db->prepare('SELECT * FROM son WHERE num_son = :num_son');
		$this->insertAll = $db->prepare('INSERT INTO son(titre_son, lien_son) VALUES(:titre_son,:lien_son)');
		$this->deleteOne = $db->prepare('DELETE FROM son WHERE num_son = :num_son');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($titre_son)
	{
		$this->selectByTitre->execute(array(':titre_son' => $titre_son));
		return $this->selectByTitre->fetch();
	}
	public function selectByNum($num_son)
	{
		$this->selectByNum->execute(array(':num_son' => $num_son));
		return $this->selectByNum->fetch();
	}
	public function insertAll($titre_son, $lien_son)
	{
		$this->insertAll->execute(array(':titre_son' => $titre_son, ':lien_son'=>$lien_son));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_son)
	{
		$this->deleteOne->execute(array(':num_son' => $num_son));
		return $this->deleteOne->rowCount();
	}
} ?>