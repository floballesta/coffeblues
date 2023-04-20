<?php
class Film
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM film ORDER BY titre_film');
		$this->selectByTitre = $db->prepare('SELECT * FROM film WHERE num_film = :num_film');
		$this->insertAll = $db->prepare('INSERT INTO film(titre_film, realisateur_film, annee_film, duree_film,contexte_film,synopsis_film,affiche_film,lien_film) VALUES(:titre_film,:realisateur_film,:annee_film,:duree_film,:contexte_film,:synopsis_film,:affiche_film,:lien_film)');
		$this->updateAll = $db->prepare('UPDATE film SET titre_film=:titre_film,realisateur_film=:realisateur_film,annee_film=:annee_film,duree_film=:duree_film,contexte_film=:contexte_film,synopsis_film=:synopsis_film,affiche_film=:affiche_film,lien_film=:lien_film WHERE num_film=:num_film');
		$this->deleteOne = $db->prepare('DELETE FROM film WHERE num_film = :num_film');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_film)
	{
		$this->selectByTitre->execute(array(':num_film' => $num_film));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($titre_film, $realisateur_film, $annee_film, $duree_film, $contexte_film, $synopsis_film, $affiche_film, $lien_film)
	{
		//$r = true;
		$this->insertAll->execute(array(':titre_film' => $titre_film, ':realisateur_film' => $realisateur_film, ':annee_film' => $annee_film, ':duree_film'=>$duree_film, ':contexte_film' => $contexte_film, ':synopsis_film' => $synopsis_film, ':affiche_film' => $affiche_film,':lien_film'=>$lien_film));
		/*if ($this->insertAll->errorCode()!=0){
			print_r($this->insertAll->errorInfo());
			$r=false;
		}
		return $r;*/
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_film, $titre_film, $realisateur_film, $annee_film, $duree_film, $contexte_film, $synopsis_film, $affiche_film, $lien_film)
	{
	$this->updateAll->execute(array(':num_film'=>$num_film,':titre_film'=>$titre_film,':realisateur_film'=>$realisateur_film,':annee_film'=>$annee_film,':duree_film'=>$duree_film,':contexte_film'=>$contexte_film,':synopsis_film'=>$synopsis_film,':affiche_film'=>$affiche_film,':lien_film'=>$lien_film));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_film)
	{
		$this->deleteOne->execute(array(':num_film' => $num_film));
		return $this->deleteOne->rowCount();
	}
} ?>