<?php
class Artiste
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT num_artiste, nom_artiste, prenom_artiste, surnom_artiste, datenaiss_artiste, datedeces_artiste, bio_artiste, photo_artiste FROM artiste ORDER BY surnom_artiste');
		$this->selectByTitre = $db->prepare('SELECT * FROM artiste WHERE num_artiste = :num_artiste');
		$this->insertAll = $db->prepare('INSERT INTO artiste(nom_artiste, prenom_artiste, surnom_artiste, datenaiss_artiste, datedeces_artiste, bio_artiste, photo_artiste) VALUES(:nom_artiste, :prenom_artiste, :surnom_artiste, :datenaiss_artiste, :datedeces_artiste, :bio_artiste, :photo_artiste)');
		$this->updateAll = $db->prepare('UPDATE artiste SET nom_artiste=:nom_artiste,prenom_artiste=:prenom_artiste,surnom_artiste=:surnom_artiste,datenaiss_artiste=:datenaiss_artiste, datedeces_artiste=:datedeces_artiste, bio_artiste=:bio_artiste,photo_artiste=:photo_artiste WHERE num_artiste=:num_artiste');
		$this->deleteOne = $db->prepare('DELETE FROM artiste WHERE num_artiste = :num_artiste');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_artiste)
	{
		$this->selectByTitre->execute(array(':num_artiste' => $num_artiste));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($nom_artiste, $prenom_artiste, $surnom_artiste, $datenaiss_artiste, $datedeces_artiste, $bio_artiste, $photo_artiste)
	{
		$this->insertAll->execute(array(':nom_artiste' => $nom_artiste, ':prenom_artiste' => $prenom_artiste, ':surnom_artiste' => $surnom_artiste, ':datenaiss_artiste' => $datenaiss_artiste, ':datedeces_artiste' => $datedeces_artiste, ':bio_artiste' => $bio_artiste, ':photo_artiste' => $photo_artiste));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_artiste,$nom_artiste,$prenom_artiste,$surnom_artiste,$datenaiss_artiste,$datedeces_artiste,$bio_artiste,$photo_artiste)
	{
	$this->updateAll->execute(array(':num_artiste'=>$num_artiste,':nom_artiste'=>$nom_artiste,':prenom_artiste'=>$prenom_artiste,':surnom_artiste'=>$surnom_artiste,':datenaiss_artiste'=>$datenaiss_artiste,':datedeces_artiste'=>$datedeces_artiste,':bio_artiste'=>$bio_artiste,':photo_artiste'=>$photo_artiste));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_artiste)
	{
		$this->deleteOne->execute(array(':num_artiste' => $num_artiste));
		return $this->deleteOne->rowCount();
	}
} 
?>