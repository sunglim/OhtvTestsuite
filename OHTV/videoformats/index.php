<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

?>
<script type="text/javascript">
//<![CDATA[
var req = false;

window.onload = function() {
  menuInit();
  registerKeyEventListener();
  setInstr('Please play all audios / videos. Navigate using up/down, then press OK to start the test.');
};
function handleKeyCode(kc) {
  if (kc==VK_UP) {
    menuSelect(selected-1);
    return true;
  } else if (kc==VK_DOWN) {
    menuSelect(selected+1);
    return true;
  } else if (kc==VK_ENTER) {
    var liid = opts[selected].getAttribute('name');
    if (liid=='exit') {
      document.location.href = '../index.php';
    } else {
      runStep(liid);
    }
    return true;
  }
  return false;
}
function runStep(name) {
  setInstr('Retrieving URL...');
  showStatus(true, '');
  if (req) {
    req.abort();
  }
  stopVideo();
  req = new XMLHttpRequest();
  req.onreadystatechange = function() {
    if (req.readyState!=4 || req.status!=200) return;
    var s = req.responseText.split('#');
    playVideo(s[0], s[1], true);
    req.onreadystatechange = null;
    req = null;
  };
  req.open('GET', 'videourl.php?id='+name);
  req.send(null);
}
function stopVideo() {
  var elem = document.getElementById('vidcontainer');
  var oldvid = document.getElementById('video');
  if (oldvid) {
    oldvid.onPlayStateChange = null;
    try {
      oldvid.stop();
    } catch (e) {
      // ignore
    }
    try {
      oldvid.release();
    } catch (e) {
      // ignore
    }
  }
  // TODO(sunglim) : temp removed
  //elem.innerHTML = '';
}
function playVideo(mtype, murl, registerlistener) {
  setInstr('Playing '+murl+' ('+mtype+')...');
  var elem = document.getElementById('vidcontainer');
  var videoobj = document.getElementById('video');
  if (videoobj == null) {
    var ihtml = '<object id="video" type="'+mtype+'" style="position: absolute; left: 700px; top: 300px; width: 320px; height: 180px;"><'+'/object>';
    // TODO(sunglim) : just switching data.
    elem.innerHTML = ihtml;
  } else {
    videoobj.data = murl;
    videoobj.type = mtype;
  }
  
  try {
    var videlem = document.getElementById('video');
    if (registerlistener) {
      videlem.onPlayStateChange = function() {
        if (1==videlem.playState) {
          videlem.onPlayStateChange = null;
          showStatus(true, mtype+' should be playing now.');
        } else if (6==videlem.playState) {
          videlem.onPlayStateChange = null;
          showStatus(false, mtype+' playback failed (error event).');
        }
      };
    }
    videlem.data = murl;
    videlem.play(1);
  } catch (e) {
    showStatus(false, 'Setting the video object '+mtype+' failed.');
  }
  
}

//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<div id="vidcontainer" style="left: 0px; top: 0px; width: 1280px; height: 720px;"></div>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">LG OHTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="hls_video_live">Unified Video (HLS)</li>
  <li name="rtl">RTL video (MP4)</li>
  <li name="mpegts">Test video (TS)</li>
  <li name="audiomp3">Audio stream (MP3)</li>
  <li name="audiomp4">Test audio (MP4)</li>
  <li name="irthd">IRT test (HD, MP4)</li>
  <li name="tsstream">Live stream test (TS, no seeking!)</li>
  <li name="nacamar1">Nacamar live stream1 (TS, no seeking!)</li>
  <li name="rtsp">RTPS video EBS (rtps video)</li>
  <li name="hls_video_live2">Wrong url</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
