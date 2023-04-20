<?php
class Comporter
{
	private $selectAll;
	private $selectByHistoire;
	private $insertAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM comporter ORDER BY num_histoire');
		$this->selectByHistoire = $db->prepare('SELECT * FROM comporter WHERE num_histoire = :num_histoire');
		$this->insertAll = $db->prepare('INSERT INTO comporter(num_histoire, num_video) VALUES(:num_histoire, :num_video)');
		$this->deleteOne = $db->prepare('DELETE FROM comporter WHERE num_histoire = :num_histoire AND num_video = :num_video');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByHistoire($num_histoire)
	{
		$this->selectByHistoire->execute(array(':num_histoire' => $num_histoire));
		return $this->selectByHistoire->fetchAll();
	}
	public function insertAll($num_histoire, $num_video)
	{
		$this->insertAll->execute(array(':num_histoire' => $num_histoire, ':num_video' => $num_video));
		return $this->insertAll->rowCount();
	}
	public function deleteOne($num_histoire, $num_video)
	{
		$this->deleteOne->execute(array(':num_histoire' => $num_histoire, ':num_video' => $num_video));
		return $this->deleteOne->rowCount();
	}
} 
?>