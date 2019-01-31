
    <!-- Begin page content -->
    <main role="main" class="container-fluid mt-5">
      <div class="row">
        <div class="col-lg-3 col-md-3 mt-5 ">
          <h3 class="text-uppercase font-weight-bold">Songs</h3>
          <ul class="list-group songs">

            <?php foreach ($viewmodel as $song): ?>
              <li class="list-group-item" url="<?php echo ROOT_URL; ?>assets/audio/<?php echo $song['song_file']; ?>" albumart="<?php echo ROOT_URL; ?>assets/images/<?php echo $song['album_art']; ?>" artist="<?php echo $song['artist']; ?>" ><?php echo $song['song_title']; ?></li>
            <?php endforeach; ?>

          </ul>
        </div>
        <div class="col-lg-3 col-md-3 offset-lg-2 mt-5 ">
          <div class="card playing " style="width: 18rem;">
            <div class="card-header">
              Currently Playing
            </div>
            <img class="card-img-top" src="<?php echo ROOT_URL; ?>assets/images/album1.jpg" alt="" id="album_art" width="400" height="250">
            <div class="card-body">
              <h5 class="card-title" id="song_title">Song title</h5>
              <!-- <p class="card-text text-small text-muted" id="song_duration">Song Duration</p> -->
              <p class="card-text" id="song_artist"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 offset-md-1 offset-lg-1 mt-5 playlist">
          <div class="d-flex flex-row  justify-content-between">
            <div>
            <h3 class="text-uppercase font-weight-bold">Playlists</h3></div>
            <div>
            <button type="button" name="button" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#create_playlist">Create playlist</button></div>
          </div>
          <ul class="list-group ">
            <?php $playlists = $this->getPlaylists(); foreach ($playlists as $playlist): ?>
              <li class="list-group-item" playlistid="<?php echo $playlist['playlist_id']; ?>"> <a href="<?php echo ROOT_URL; ?>songs/playplaylist/<?php echo $playlist['playlist_id']; ?>"><?php echo $playlist['playlist_name']; ?></a>  </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>


    </main>

    <footer class="footer bg-dark">
      <div class="container-fluid player">
      <div class="row mb-0">
          <div class="col-lg-4 col-md-4 offset-lg-5">
            <audio  class="d-none" id="current_song">
              <source src="<?php echo ROOT_URL; ?>assets/audio/1.mp3" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
            <ul class="pagination pagination-lg ml-4 mb-0">
               <li class="page-item ">
                 <a class="page-link prev" href="#" onclick="return false;"><i class="fas fa-caret-left fa-2x"></i></a>
               </li>
               <li class="page-item">
                 <a class="page-link play" href="#" onclick="return false;" >
                 <i class="fas fa-play-circle fa-2x btn-play"></i>
                 </a>
                 <a class="page-link pause d-none" href="#" onclick="return false;">
                 <i class="fas fa-pause-circle fa-2x btn-pause"></i>
                 </a>
               </li>
               <li class="page-item"><a class="page-link next" href="#" onclick="return false;"><i class="fas fa-caret-right fa-2x"></i></a></li>
             </ul>
          </div>
          <div class="col-lg-3 col-md-3">
             <div class="volume mt-1 float-right">
                <input type="range" min="1" max="10" value="5" class="slider" id="volume_control">
             </div>
          </div>
        </div>
      </div>
  </footer>
  <!-- The Modal -->
  <div class="modal" id="create_playlist">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Playlist</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div id="playlist-name-div">
                <div class="form-group">
                  <label for="usr">Playlist Name:</label>
                  <input type="text" class="form-control" id="playlist_name" maxlength="150">
                </div>
                <div class="form-group">
                  <button type="button" name="button" class="btn btn-primary float-right" id="create-playlist-btn">Create</button>
                </div>
              </div>
              <div class=" d-none" id="songs-for-playlist">

                  <p id="show_pname"></p>
                <p id="result" class="text-small text-success d-none"></p>

                <div class="form-group">
                  <input type="hidden" id="playlist_id" value="">
                </div>
                <ul class="list-group ">
                  <?php $songs = $this->getSongs(); foreach ($songs as $song): ?>
                    <li class="list-group-item" url="<?php echo ROOT_URL; ?>assets/audio/<?php echo $song['song_file']; ?>" albumart="<?php echo ROOT_URL; ?>assets/images/<?php echo $song['album_art']; ?>" artist="<?php echo $song['artist']; ?>" songid="<?php echo $song['song_id']; ?>" > <?php echo $song['song_title']; ?>
                    <button type="button" name="button" class="btn btn-default add float-right">
                    <i class="fas fa-plus float-right text-primary"></i></button>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>

            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        </div>

      </div>
    </div>
  </div>
<script type="text/javascript">

</script>
