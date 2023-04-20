<?php
class Ouvrage
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM ouvrage');
		$this->selectByTitre = $db->prepare('SELECT * FROM ouvrage WHERE num_ouvrage = :num_ouvrage');
		$this->insertAll = $db->prepare('INSERT INTO ouvrage(ISBN, titre_ouvrage, theme_ouvrage, auteur_ouvrage, editeur_ouvrage) VALUES(:ISBN, :titre_ouvrage, :theme_ouvrage, :auteur_ouvrage, :editeur_ouvrage)');
		$this->updateAll = $db->prepare('UPDATE ouvrage SET ISBN=:ISBN,titre_ouvrage=:titre_ouvrage,theme_ouvrage=:theme_ouvrage,auteur_ouvrage=:auteur_ouvrage,editeur_ouvrage=:editeur_ouvrage WHERE num_ouvrage=:num_ouvrage');
		$this->deleteOne = $db->prepare('DELETE FROM ouvrage WHERE num_ouvrage = :num_ouvrage');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_ouvrage)
	{
		$this->selectByTitre->execute(array(':num_ouvrage' => $num_ouvrage));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($ISBN, $titre_ouvrage, $theme_ouvrage, $auteur_ouvrage, $editeur_ouvrage)
	{
		$this->insertAll->execute(array(':ISBN' => $ISBN, ':titre_ouvrage' => $titre_ouvrage, ':theme_ouvrage' => $theme_ouvrage, ':auteur_ouvrage' => $auteur_ouvrage, ':editeur_ouvrage' => $editeur_ouvrage));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_ouvrage,$ISBN, $titre_ouvrage, $theme_ouvrage, $auteur_ouvrage, $editeur_ouvrage)
	{
	$this->updateAll->execute(array(':num_ouvrage'=>$num_ouvrage,':ISBN'=>$ISBN,':titre_ouvrage'=>$titre_ouvrage,':theme_ouvrage' => $theme_ouvrage, ':auteur_ouvrage'=>$auteur_ouvrage,':editeur_ouvrage'=>$editeur_ouvrage));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_ouvrage)
	{
		$this->deleteOne->execute(array(':num_ouvrage' => $num_ouvrage));
		return $this->deleteOne->rowCount();
	}
} 
?>