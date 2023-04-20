<?php
class Morceau
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM morceau');
		$this->selectByTitre = $db->prepare('SELECT * FROM morceau WHERE num_morceau = :num_morceau');
		$this->insertAll = $db->prepare('INSERT INTO morceau(titre_morceau, desc_morceau, lien_morceau) VALUES(:titre_morceau, :desc_morceau, :lien_morceau)');
		$this->updateAll = $db->prepare('UPDATE morceau SET titre_morceau=:titre_morceau,desc_morceau=:desc_morceau,lien_morceau=:lien_morceau WHERE num_morceau=:num_morceau');
		$this->deleteOne = $db->prepare('DELETE FROM morceau WHERE num_morceau = :num_morceau');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_morceau)
	{
		$this->selectByTitre->execute(array(':num_morceau' => $num_morceau));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($titre_morceau, $desc_morceau, $lien_morceau)
	{
		$this->insertAll->execute(array(':titre_morceau' => $titre_morceau, ':desc_morceau' => $desc_morceau, ':lien_morceau' => $lien_morceau));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_morceau, $titre_morceau, $desc_morceau, $lien_morceau)
	{
	$this->updateAll->execute(array(':num_morceau'=>$num_morceau,':titre_morceau'=>$titre_morceau,':desc_morceau'=>$desc_morceau, ':lien_morceau'=>$lien_morceau));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_morceau)
	{
		$this->deleteOne->execute(array(':num_morceau' => $num_morceau));
		return $this->deleteOne->rowCount();
	}
} ?>