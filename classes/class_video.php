<?php
class Video
{
	private $selectAll;
	private $selectByTitre;
	private $insertAll;
	private $updateAll;
	private $deleteOne;
	
	public function __construct($db)
	{
		$this->selectAll = $db->prepare('SELECT * FROM videos_youtube');
		$this->selectByTitre = $db->prepare('SELECT * FROM videos_youtube WHERE num_video = :num_video');
		$this->insertAll = $db->prepare('INSERT INTO videos_youtube(titre_video, lien_video) VALUES(:titre_video, :lien_video)');
		$this->updateAll = $db->prepare('UPDATE videos_youtube SET titre_video=:titre_video,lien_video=:lien_video WHERE num_video=:num_video');
		$this->deleteOne = $db->prepare('DELETE FROM videos_youtube WHERE num_video = :num_video');
	}
	public function selectAll()
	{
		$this->selectAll->execute();
		return $this->selectAll->fetchAll();
	}
	public function selectByTitre($num_video)
	{
		$this->selectByTitre->execute(array(':num_video' => $num_video));
		return $this->selectByTitre->fetch();
	}
	public function insertAll($titre_video, $lien_video)
	{
		$this->insertAll->execute(array(':titre_video' => $titre_video, ':lien_video' => $lien_video));
		return $this->insertAll->rowCount();
	}
	public function updateAll($num_video, $titre_video, $lien_video)
	{
	$this->updateAll->execute(array(':num_video'=>$num_video, ':titre_video'=>$titre_video, ':lien_video'=>$lien_video));
	return $this->updateAll->rowCount();
	}
	public function deleteOne($num_video)
	{
		$this->deleteOne->execute(array(':num_video' => $num_video));
		return $this->deleteOne->rowCount();
	}
} ?>