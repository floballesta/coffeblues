<?php
class Analyse
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM analyse');
		$this->selectByTitre = $db->prepare('SELECT * FROM analyse WHERE num_analyse = :num_analyse');
		$this->insertAll = $db->prepare('INSERT INTO analyse(titre_analyse, desc_analyse) VALUES(:titre_analyse, :desc_analyse)');
		$this->updateAll = $db->prepare('UPDATE analyse SET titre_analyse=:titre_analyse,desc_analyse=:desc_analyse WHERE num_analyse=:num_analyse');
		$this->deleteOne = $db->prepare('DELETE FROM analyse WHERE num_analyse = :num_analyse');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_analyse)
	{
		$this->selectByTitre->execute(array(':num_analyse' => $num_analyse));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($titre_analyse, $desc_analyse)
	{
		$this->insertAll->execute(array(':titre_analyse' => $titre_analyse, ':desc_analyse' => $desc_analyse));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_analyse, $titre_analyse, $desc_analyse)
	{
	$this->updateAll->execute(array(':num_analyse'=>$num_analyse,':titre_analyse'=>$titre_analyse,':desc_analyse'=>$desc_analyse));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_analyse)
	{
		$this->deleteOne->execute(array(':num_analyse' => $num_analyse));
		return $this->deleteOne->rowCount();
	}
} ?>