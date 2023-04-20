<?php
class Catblues
{
	private $selectAll;
	private $selectByNum;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM catblues');
		$this->selectByNum = $db->prepare('SELECT * FROM catblues WHERE num_catblues = :num_catblues');
		$this->insertAll = $db->prepare('INSERT INTO catblues(titre_catblues) VALUES(:titre_catblues)');
		$this->updateAll = $db->prepare('UPDATE catblues SET titre_catblues=:titre_catblues WHERE num_catblues = :num_catblues');
		$this->deleteOne = $db->prepare('DELETE FROM catblues WHERE num_catblues = :num_catblues');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByNum($num_catblues)
	{
		$this->selectByNum->execute(array(':num_catblues' => $num_catblues));
		return $this->selectByNum->fetch();
	}
	public function insertAll($titre_catblues)
	{
		$this->insertAll->execute(array(':titre_catblues' => $titre_catblues));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_catblues,$titre_catblues)
	{
		$this->updateAll->execute(array(':num_catblues' => $num_catblues,':titre_catblues' => $titre_catblues));
		return $this->updateAll->rowCount();
	}
	public function deleteOne($num_catblues)
	{
		$this->deleteOne->execute(array(':num_catblues' => $num_catblues));
		return $this->deleteOne->rowCount();
	}
} ?>