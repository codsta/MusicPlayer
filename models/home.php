<?php
class HomeModel extends Model{
	public function Index(){
		return;
	}
  public function getSongs()
  {

    $stmt = $this->conn->prepare('SELECT * from songs LIMIT 10 ');
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$this->conn ="";
	  return $row;
  }
	public function showplaylists(){
		$stmt = $this->conn->prepare('SELECT * FROM playlists WHERE `user_id`= :uid LIMIT 10');
		$stmt->bindParam(':uid', $_SESSION['user_id']);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		$this->conn ="";
	}
	public function getPlaylistSongs()
  {
    $pid = $_GET['id'];
    $stmt = $this->conn->prepare('
    SELECT * FROM `playlists` p INNER JOIN `playlist_songs` ps ON ps.`playlists_id` = p.`playlist_id` AND p.playlist_id = :pid INNER JOIN `songs` s ON ps.`song_id` = s.`song_id` INNER JOIN `users` u ON p.`user_id` = u.`user_id` AND u.user_id = :uid');
    $stmt->bindParam(':pid', $pid);
    $stmt->bindParam(':uid', $uid);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
    $this->conn ="";
  }

}
