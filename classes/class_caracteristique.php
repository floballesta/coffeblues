<?php
class Caracteristique
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM caracteristique');
		$this->selectByTitre = $db->prepare('SELECT * FROM caracteristique WHERE num_caracteristique = :num_caracteristique');
		$this->insertAll = $db->prepare('INSERT INTO caracteristique(titre_caracteristique, desc_caracteristique) VALUES(:titre_caracteristique, :desc_caracteristique)');
		$this->updateAll = $db->prepare('UPDATE caracteristique SET titre_caracteristique=:titre_caracteristique,desc_caracteristique=:desc_caracteristique WHERE num_caracteristique=:num_caracteristique');
		$this->deleteOne = $db->prepare('DELETE FROM caracteristique WHERE num_caracteristique = :num_caracteristique');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_caracteristique)
	{
		$this->selectByTitre->execute(array(':num_caracteristique' => $num_caracteristique));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($titre_caracteristique, $desc_caracteristique)
	{
		$this->insertAll->execute(array(':titre_caracteristique' => $titre_caracteristique, ':desc_caracteristique' => $desc_caracteristique));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_caracteristique, $titre_caracteristique, $desc_caracteristique)
	{
	$this->updateAll->execute(array(':num_caracteristique'=>$num_caracteristique,':titre_caracteristique'=>$titre_caracteristique,':desc_caracteristique'=>$desc_caracteristique));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_caracteristique)
	{
		$this->deleteOne->execute(array(':num_caracteristique' => $num_caracteristique));
		return $this->deleteOne->rowCount();
	}
} ?>