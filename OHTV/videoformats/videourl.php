<?php
require('JSON.php');
$json = new Services_JSON();

header('Content-Type: text/plain;charset=UTF-8');
$id = $_REQUEST['id'];
if ($id=='ardepg') {
  echo 'video/mp4#http://itv.ard.de/video/trailer.php';
} else if ($id=='mpegts') {
  echo 'video/mpeg#http://192.168.1.63/1.ts';
} else if ($id=='rtl') {
  echo 'video/mp4#http://bilder.rtl.de/tt_hd/trailer_hotelinspektor.mp4';
} else if ($id=='audiomp3') {
  echo 'audio/mpeg#http://swr.ic.llnwd.net/stream/swr_mp3_m_swr3a';
} else if ($id=='audiomp4') {
  echo 'audio/mp4#http://itv.ard.de/video/audio.php';
} else if ($id=='irthd') {
  echo 'video/mp4#http://itv.ard.de/video/irthd.mp4';
} else if ($id=='tsstream') {
  echo 'video/mpeg#http://itv.ard.de/video/livestream.php';
} else if ($id=='gundl1') {
  echo 'video/mpeg#http://hbbtv.olympia.gl-systemhaus.de/olympia1.ts';
} else if ($id=='nacamar1') {
  echo 'video/mpeg#http://hbbtv.nacamar.c.nmdn.net/nacamar/test';
} else if ($id=='hls_video_live2') {
  echo 'application/vnd.apple.mpegurl#http://121.189.13.157/';
} else if ($id=='hls_video_live') {
  echo 'application/vnd.apple.mpegurl#http://fs1023.pooq.x-cdn.com:1935/pooqsbsvod/_etc_/sbsmedia/cu/0470/cu0470i0013800.mp4/playlist.m3u8?token=2ae0b2fd4d4034cd85cbbd0e6edeb5ef&expr=53184986&playstart=0&playduration=180';
} else {
  echo 'Unknown ID';
}
?>
