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
  echo 'application/vnd.apple.mpegurl#http://121.189.13.157/http://vod.ohtv.kbs.gscdn.com/ohtv_zzim/_definst_/mp4:T2013-0557/T2013-0557_S000_20140221_PS-2014016415-01-000_03_M4H20600.mp4/playlist.m3u8?id=2101&si=3&secure=ODc3OTcxMjM2ZjUzOWRhOGY4N2FlMzNhYWQ3NTg1MzVmNGU3NTVkZTg0MTUzZmVhNTEyODc4N2E1Yjg0MjhhZTBlZGM4NTI1ZTZkNmM1ZDA0ZDViZWZlYWE3ZjViOGQyZDQ4ODNmNmY0NTRiMGRlMzllODllZTEwZDU3YzkxY2M1MzczMTc1ZDI1YjdiZDk2NGViMDk5ZTJhNjQyZDE4ZTVlOWVhOTBiNTZmMWFlZjlhOGMzYTk4YjY1NzVhNjE4MWQzODJmOTA4ZTA4NTUzNWVjY2FlZTNlMmYyM2I0YjVlOWM2ZjRjY2I1NzQyOWZhNGEyZjliNjYzZjQ2MTc1NjNjZmE1MjFmZDdlNTI1N2E3MzAzMmUyOWVlNTBiNjFkNGRhMTEyOWZmMDE5NzllYzBlNDQ3ZTI5YjdkMDBjYWMyODljMDEwMDVlZGMyZWQ0NDNiNTAwNWYwNGUzNzE0MTM3YTIwOTk4ZWQ5NjMyNTNlODFjN2VhMDljMGFlNjQ4ZjE1ODk3MWYzNDE0NWZjY2ZlMzdhOWZmZTA4NDgzNTI1NDAzN2EwNzNlMmVlYjc2ODlmMDQ4MTFjMTk5NzgwNDQyNzJkNGNmMDRkNjkzZjU5MWI5NDIxODEwN2M5NTljZTU1YTVmYmE2NmUxN2QyNWFhZTk0Y2RjYWY5MDQ1NTY=&csu=false&wowzaplaystart=1860000&wowzaplayduration=180000';
  //echo 'video/mp4#http://fs3000.pooq.x-cdn.com:1935/pooqsbsvod/_etc_/sbsmedia/et/2018/et2018i0001400.mp4/playlist.m3u8?token=58254fbdd8bfcc01a1cdf146e7167fef&expr=530b505f&playstart=0&playduration=180';
} else {
  echo 'Unknown ID';
}
?>
