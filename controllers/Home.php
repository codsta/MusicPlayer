<?php
class Home extends Controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}

  protected function getSongs(){
    $viewmodel = new HomeModel();
    return $viewmodel->getSongs();
  }
  protected function getPlaylists(){
    $song = new HomeModel();
  	return $song->showplaylists();
  }
  protected function getPlaylistSongs(){
    $song = new HomeModel();
  	return $song->getPlaylistSongs();
  }


}
