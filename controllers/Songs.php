<?php
class Songs extends Controller{
	protected function createPlaylist(){
    $model = new SongModel();
    $model->createPlaylist();
  }
	protected function addtoplaylist(){
    $model = new SongModel();
    $model->addtoplaylist();
  }
	public function showplaylists(){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if( $post['playlist_id'] && $post['song_id'] ){

			$playlist_id= $post['playlist_id'];
			$song_id = $post['song_id'];
			$stmt = $this->conn->prepare('SELECT * FROM playlists WHERE `user_id`= :uid');
			$stmt->bindParam(':uid', $_SESSION['user_id']);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		return;
	}
	protected function playplaylist(){
		$viewmodel = new SongModel();
		// return $song->playplaylist();
		$this->returnView($viewmodel->playplaylist(), true);
	}

  protected function getSongs(){
    $viewmodel = new SongModel();
    return $viewmodel->getSongs();
  }
	protected function getPlaylists(){
		$song = new SongModel();
		return $song->showplaylists();
	}
}
