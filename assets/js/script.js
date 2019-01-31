
var song;
var volume = $('.volume');

var ele = $('.songs li:first-child');
var _x= function( id ) { return document.getElementById( id ); };

var slider = document.getElementById("volume_control");

slider.oninput = function() {
  song = _x("current_song");
  song.volume = this.value / 10;
}

function initAudio(elem) {
    var url = elem.attr('url');
    var title = elem.text();
    var cover = elem.attr('albumart');
    var artist = elem.attr('artist');
    _x("current_song").src = url;
    _x("album_art").src = cover;
    _x("song_title").innerHTML = '';
    _x("song_title").innerHTML = title;
    _x("song_artist").innerHTML = artist;

}
function playAudio() {
    song = _x("current_song");
    song.play();
}
function stopAudio() {
    song = _x("current_song");
    song.pause();
}
function playNext() {
  var next = ele.next();
  ele = ele.next();
  if (next.length == 0) {
      next = $('.songs li:first-child');
  }
  initAudio(next);
  playAudio();

}
function playPrev()
{
  var prev = ele.prev();
  ele = ele.prev();
  if (prev.length == 0) {
      prev = $('.songs li:first-child');
  }
  initAudio(prev);
  playAudio();
}
$(document).ready(function(){
  initAudio(ele);
  $( "a.play" ).click(function() {
    $('a.play').hide();
    $('a.pause').removeClass('d-none');
    playAudio();
  });
  $( "a.pause" ).click(function() {
    $('a.play').show();
    $('a.pause').addClass('d-none');
    stopAudio();
  });
  $('.prev').click(function(){
    playPrev();
  });
  $('.next').click(function(){
    playNext();
  });
});
//
// add to playlist

$('.add').click(function(){
  var song_id = $(this).parent().attr('songid');
  var playlist_id = _x('playlist_id').value;
  var url = root_url+"/songs/addtoplaylist";
  var data = { 'playlist_id': playlist_id , 'song_id': song_id };
  post(url,data);
  $(this).parent().hide();
});
var playlist_name;
$('#create-playlist-btn').click(function(){
  playlist_name = $('#playlist_name').val();
  var url = root_url+"songs/createplaylist";
  var data = { 'playlist_name': playlist_name };

  post(url,data);
  $('#playlist-name-div').hide();
  $('#songs-for-playlist').removeClass('d-none');

  _x('show_pname').innerHTML = playlist_name;
});
function setPlaylistId(val) {
  _x('playlist_id').value = val;
}
function post(url,data1) {
  $.ajax({
        url: url,
        type: "post",
        dataType:'json',
        data: data1,
        success: function(data, status, xhr) {
          if(data.hasOwnProperty('playlist_id')){
            setPlaylistId(data.playlist_id);
          }
          if(data.hasOwnProperty('added')){
            _x('result').value = 'track been added to your playlist!';
          }
        },
        error: function(xhr, status, errorMessage) {
            return false;
        }
    });
}
