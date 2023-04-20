<?php
class Histoire
{
	private $selectAll;
	private $selectByTitre;
	private $selectByCat;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM histoire ORDER BY titre_histoire');
		$this->selectByTitre = $db->prepare('SELECT * FROM histoire WHERE num_histoire = :num_histoire ORDER BY titre_histoire');
		$this->selectByCat = $db->prepare('SELECT * FROM histoire WHERE num_catblues = :num_catblues ORDER BY titre_histoire');
		$this->insertAll = $db->prepare('INSERT INTO histoire(titre_histoire, desc_histoire, num_ouvrage, num_catblues) VALUES(:titre_histoire, :desc_histoire, :num_ouvrage, :num_catblues)');
		$this->updateAll = $db->prepare('UPDATE histoire SET titre_histoire=:titre_histoire,desc_histoire=:desc_histoire,num_ouvrage=:num_ouvrage, num_catblues = :num_catblues WHERE num_histoire=:num_histoire');
		$this->deleteOne = $db->prepare('DELETE FROM histoire WHERE num_histoire = :num_histoire');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_histoire)
	{
		$this->selectByTitre->execute(array(':num_histoire' => $num_histoire));
		return $this->selectByTitre->fetch();
	}
	public function selectByCat($num_catblues)
	{
		$this->selectByCat->execute(array(':num_catblues' => $num_catblues));
		return $this->selectByCat->fetchAll();
	}
	public function insertAll($titre_histoire, $desc_histoire, $num_ouvrage, $num_catblues)
	{
		$this->insertAll->execute(array(':titre_histoire' => $titre_histoire, ':desc_histoire' => $desc_histoire, ':num_ouvrage' => $num_ouvrage, ':num_catblues' => $num_catblues));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_histoire, $titre_histoire, $desc_histoire, $num_ouvrage, $num_catblues)
	{
	$this->updateAll->execute(array(':num_histoire'=>$num_histoire,':titre_histoire'=>$titre_histoire,':desc_histoire'=>$desc_histoire, ':num_ouvrage'=>$num_ouvrage, ':num_catblues' => $num_catblues));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_histoire)
	{
		$this->deleteOne->execute(array(':num_histoire' => $num_histoire));
		return $this->deleteOne->rowCount();
	}
} ?>