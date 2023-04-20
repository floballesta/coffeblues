<?php
class Image_ville
{
	private $selectAll;
	private $selectByTitre;
	private $selectByNum;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM image_ville');
		$this->selectByTitre = $db->prepare('SELECT * FROM image_ville WHERE num_ville = :num_ville');
		$this->selectByNum = $db->prepare('SELECT * FROM image_ville WHERE num_image = :num_image');
		$this->insertAll = $db->prepare('INSERT INTO image_ville(lien_image, num_ville) VALUES(:lien_image, :num_ville)');
		$this->updateAll = $db->prepare('UPDATE image_ville SET lien_image=:lien_image,num_ville=:num_ville WHERE num_image=:num_image');
		$this->deleteOne = $db->prepare('DELETE FROM image_ville WHERE num_image = :num_image');
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
	public function selectByNum($num_image)
	{
		$this->selectByNum->execute(array(':num_image' => $num_image));
		return $this->selectByNum->fetch();
	}
	public function insertAll($lien_image, $num_ville)
	{
		$this->insertAll->execute(array(':lien_image' => $lien_image, ':num_ville' => $num_ville));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_image, $lien_image, $num_ville)
	{
	$this->updateAll->execute(array(':num_image'=>$num_image,':lien_image'=>$lien_image, ':num_ville'=>$num_ville));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_image)
	{
		$this->deleteOne->execute(array(':num_image' => $num_image));
		return $this->deleteOne->rowCount();
	}
} ?>