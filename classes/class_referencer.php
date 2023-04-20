<?php
class Referencer
{
	private $selectAll;
	private $selectByFilm;
	private $selectByArtiste;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM referencer ORDER BY num_film');
		$this->selectByFilm = $db->prepare('SELECT * FROM referencer WHERE num_film = :num_film');
		$this->selectByArtiste = $db->prepare('SELECT * FROM referencer WHERE num_artiste = :num_artiste');
		$this->insertAll = $db->prepare('INSERT INTO referencer(num_film, num_artiste) VALUES(:num_film, :num_artiste)');
		$this->deleteOne = $db->prepare('DELETE FROM referencer WHERE num_film = :num_film AND num_artiste = :num_artiste');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByFilm($num_film)
	{
		$this->selectByFilm->execute(array(':num_film' => $num_film));
		return $this->selectByFilm->fetchAll();
	}
	public function selectByArtiste($num_artiste)
	{
		$this->selectByArtiste->execute(array(':num_artiste' => $num_artiste));
		return $this->selectByArtiste->fetchAll();
	}
	public function insertAll($num_film, $num_artiste)
	{
		$this->insertAll->execute(array(':num_film' => $num_film, ':num_artiste' => $num_artiste));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_film, $num_artiste)
	{
		$this->deleteOne->execute(array(':num_film' => $num_film, ':num_artiste' => $num_artiste));
		return $this->deleteOne->rowCount();
	}
} 
?>