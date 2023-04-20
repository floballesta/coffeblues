<?php
class Ville
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM ville');
		$this->selectByTitre = $db->prepare('SELECT * FROM ville WHERE num_ville = :num_ville');
		$this->insertAll = $db->prepare('INSERT INTO ville(nom_ville, desc_ville, zone_ville) VALUES(:nom_ville, :desc_ville, :zone_ville)');
		$this->updateAll = $db->prepare('UPDATE ville SET nom_ville=:nom_ville,desc_ville=:desc_ville,zone_ville=:zone_ville WHERE num_ville=:num_ville');
		$this->deleteOne = $db->prepare('DELETE FROM ville WHERE num_ville = :num_ville');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_ville)
	{
		$this->selectByTitre->execute(array(':num_ville' => $num_ville));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($nom_ville, $desc_ville, $zone_ville)
	{
		$this->insertAll->execute(array(':nom_ville' => $nom_ville, ':desc_ville' => $desc_ville, ':zone_ville' => $zone_ville));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_ville, $nom_ville, $desc_ville, $zone_ville)
	{
	$this->updateAll->execute(array(':num_ville'=>$num_ville,':nom_ville'=>$nom_ville,':desc_ville'=>$desc_ville, ':zone_ville'=>$zone_ville));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_ville)
	{
		$this->deleteOne->execute(array(':num_ville' => $num_ville));
		return $this->deleteOne->rowCount();
	}
} ?>