<?php
require('JSON.php');
$json = new Services_JSON();

header('Content-Type: text/plain;charset=UTF-8');
$id = $_REQUEST['id'];
if ($id=='ardepg') {
  echo 'video/mp4#http://itv.ard.de/video/trailer.php';
} else if ($id=='mpegts') {
  echo 'video/mpeg#http://192.168.1.100/1.mp4';
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
  echo 'application/vnd.apple.mpegurl#http://112.175.227.222/http://vod.ohtv.kbs.gscdn.com/ohtv_zzim/_definst_/mp4:T2014-0506/T2014-0506_S000_20141101_PS-2014203531-01-000_02_M4H20600.mp4/playlist.m3u8?id=2101&si=9&secure=MmRkYTQyOTMwZTM3Y2YyMGQwOGMzZDQyMTk0NWE3ZmM4NDUwNzU5YzU5ZGExZTcxNDYwYTkwMDQ1NzY2MGExNjg1OTM1YmM0OGRhMWM3M2NjNWMzYjIyNDg2NDBmMTVlMTNiOTNjNGNiNGQyZmNlZDMwMmJhM2IyNWFlZjI3MmU5YTBjNzkyZDJmMTYxYTA2OTIwN2UzOTFlMDA2MDE4MGQ1ODM2ZjE4OGViM2Y4OGU2ZjNkYmQ1ZGM0ZjE3MmRjNWQ0YWU1ZDYyZTVmZmM1MTZmM2IxOTJjMWZkNjY2NDZjMzU4YTNjZDE1MWJkMjY4OTE0YjNhYjhiNTUyODEwYWFkNWViMDI4ZDBmNDY1OWNjMDNhNzYxOWMzNjQxMTQ5MmI4M2Y4NjFlZmZlZWI4OTNjZjJhMzE1YjA0YjgxNjE2MzYxOGFmZDFiZDc5ZmNjNDQwNDgyYmI3ZTdmOWRlNmJjY2E4ZmYwZGRlODc0Y2Y4NzllYTRlNzZlYmQ2MzUwNGVlZGFjMGEyMTRmOTgxMmJkMjU2MGE5NTFiOWVkNTc3YWU4Yjc2MmJmNDc5YjRmY2YzZjBkMDA0ZDdlMTUwOGZiNWYwN2E1ODk4YmY2YmE0ODkwYzA0NDlhZjM2ZGEyZmM3MjU1ZThjZmEzYmM5ZjdjNzU5MjZkZDY3OTlmNzg=&csu=false&wowzaplaystart=2520000&wowzaplayduration=180000';
} else if ($id=='rtsp') {
  echo 'video/mp4#rtsp://ebsandroid.nefficient.com/plus2tablet500k/tablet500k';
} else {
  echo 'Unknown ID';
}
?>
