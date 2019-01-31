<?php
class SongModel extends Model{

  public function createplaylist(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if( $post['playlist_name'] ){

      $playlist_name = $post['playlist_name'];
      $stmt = $this->conn->prepare('INSERT INTO playlists(`playlist_name`,`user_id`) VALUES(:pn,:uid)');
      $stmt->bindParam(':pn', $playlist_name);
      $stmt->bindParam(':uid', $_SESSION['user_id']);
      $stmt->execute();
      $playlist_id = $this->conn->lastInsertId();
      $this->conn ="";
      echo json_encode(array('message'=> 'Playlist Created' , 'playlist_id'=> $playlist_id));

    }
    return;
  }

  public function addtoplaylist(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if( $post['playlist_id'] && $post['song_id'] ){

      $playlist_id= $post['playlist_id'];
      $song_id = $post['song_id'];
      $stmt = $this->conn->prepare('INSERT INTO playlist_songs(`song_id`,`playlists_id`) VALUES(:sid,:pid)');
      $stmt->bindParam(':sid', $song_id);
      $stmt->bindParam(':pid', $playlist_id);
      return $stmt->execute();
      $this->conn ="";
    }
    return;
  }

  public function playplaylist()
  {
    $pid = $_GET['id'];
    $stmt = $this->conn->prepare('
    SELECT `playlist_id`, `playlist_name`,s.`song_id` ,`song_file`, `song_title`, `artist`, `album`, `album_art` , u.user_id FROM `playlists` p INNER JOIN `playlist_songs` ps ON ps.`playlists_id` = p.`playlist_id` AND p.playlist_id = :pid INNER JOIN `songs` s ON ps.`song_id` = s.`song_id` INNER JOIN `users` u ON p.`user_id` = u.`user_id` AND u.user_id = :uid');
    $stmt->bindParam(':pid', $pid ,PDO::PARAM_INT);
    $stmt->bindParam(':uid', $_SESSION['user_id'] ,PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
    $this->conn ="";
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
}
