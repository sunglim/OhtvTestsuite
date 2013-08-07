<?php

function sendContentType() {
  header('Pragma: no-cache');
  header('Cache-Control: no-cache');
  header('Content-Style-Type: text/css');
  header('Content-Type: application/vnd.ohtv.xhtml+xml; charset=UTF-8');
}

function videoObject($left=0, $top=0, $width=1280, $height=720) {
  return '<object id="video" type="application/x-ohtv-tvcontrol" style="position: absolute; left: '.$left.'px; top: '.$top.'px; width: '.$width.'px; height: '.$height.'px;"></object>';
}

function openDocument($title='OHTV testsuite', $allscripts=1, $addheaders='') {
  global $ROOTDIR;
  echo '<?xml version="1.0" encoding="utf-8" ?>'."\n";
  echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n";
  echo "<head>\n";
  echo "<title>$title</title>\n".$addheaders;
  echo "<meta http-equiv=\"content-type\" content=\"Content-Type: application/vnd.ohtv.xhtml+xml; charset=UTF-8\" />\n";
  echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$ROOTDIR/base.css\" />\n";
  echo "<script type=\"text/javascript\" src=\"$ROOTDIR/settings.js\"></script>\n";
  echo "<script type=\"text/javascript\" src=\"$ROOTDIR/releaseinfo.js\"></script>\n";
  if ($allscripts) {
    echo "<script type=\"text/javascript\" src=\"$ROOTDIR/keycodes.js\"></script>\n";
    echo "<script type=\"text/javascript\" src=\"$ROOTDIR/base.js\"></script>\n";
  }
}

?>
