<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

?>
<script type="text/javascript">
//<![CDATA[
var fullscreen = false;

window.onload = function() {
  menuInit();
  initVideo();
  registerKeyEventListener();
  initApp();
  setInstr('Please run all steps in the displayed order. Navigate to the test using up/down, then press OK to start the test. For some tests, you may need to follow some instructions.');
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
  setInstr('Executing step...');
  showStatus(true, '');
  if (name=='full') {
    setvidsize(0, 0, 1280, 720, 'fullscreen in the background.');
  } else if (name=='vidclip') {
    var e = document.getElementById('vidcontainer');
    e.style.left = '700px';
    e.style.top = '260px';
    e.style.width = '320px';
    e.style.height = '180px';
    setvidsize(-64, -36, 448, 252, 'on the right of the screen (vertically centered, only partially visible).');
    markVideoPosition(700, 260, 320, 180);
  } else if (name=='togglefs') {
    togglefullscreen();
  } else if (name=='getSource') {
    try{
      var source = document.getElementById('video').getSource();
      showStatus(true, 'tvcontrol.getSource should returns '+source+'. Check TV Screen',true);
    }catch(e){
        showStatus(false, 'unable to determine tvcontrol.getSource() ');
    }
  } else if (name=='vidbroadcast') {
    govid();
  } else if (name=='vidstop') {
    try {
      document.getElementById('video').stop();
      showStatus(true, 'Video should now be stopped.');
    } catch (e) {
      showStatus(false, 'Stopping video failed.');
    }
    showVideoPosition(false);
  }
}
function setvidsize(x, y, w, h, txt) {
  var vid = document.getElementById('video');
  vid.style.left = x+'px'; 
  vid.style.top = y+'px'; 
  vid.style.width = w+'px'; 
  vid.style.height = h+'px'; 
  showStatus(true, 'Please check visual result.');
  setInstr('Video position should now be '+txt);
  markVideoPosition(x, y, w, h);
}
function markVideoPosition(x, y, w, h) {
  var e = document.getElementById('vidpostxt');
  e.style.left = x+'px';
  e.style.top = (y-30)+'px';
  e = document.getElementById('vidposborder');
  e.style.left = (x-4)+'px'; 
  e.style.top = (y-4)+'px'; 
  e.style.width = w+'px'; 
  e.style.height = h+'px'; 
}
function showVideoPosition(isshowing) {
  var e = document.getElementById('vidpostxt');
  e.style.display = isshowing ? 'block' : 'none';
  e = document.getElementById('vidposborder');
  e.style.display = isshowing ? 'block' : 'none';
}
function togglefullscreen() {
  fullscreen = !fullscreen;
  var oldsel = selected;
  try {
    document.getElementById('video').setFullScreen(fullscreen);
    showStatus(true, 'Setting fullScreen('+fullscreen+') mode succeeded');
  } catch (e) {
    showStatus(false, 'Setting fullScreen('+fullscreen+') mode failed');
  }
  menuSelect(oldsel);
  showVideoPosition(!fullscreen);
}
function govid() {
  var elem = document.getElementById('vidcontainer');
  var oldvid = document.getElementById('video');
  try {
    oldvid.setSource(1);
  } catch (e) {
    // ignore
  }

  var ihtml = '<object id="video" type="application/x-ohtv-tvcontrol" style="position: absolute; left: 600px; top: 250px; width: 160px; height: 90px;"><'+'/object>';
  elem.style.left = '0px';
  elem.style.top = '0px';
  elem.style.width = '1280px';
  elem.style.height = '720px';
  elem.innerHTML = ihtml;
  var succss = false;
  try {
    var videlem = document.getElementById('video');
    if (videlem) {
        succss = true;
    }
  } catch (e) {
    succss = false;
    // failed
  }
  showStatus(succss, 'TV Screen should appear in the center.',true);
  markVideoPosition(600, 250, 160, 90);
  showVideoPosition(true);
}

//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<div id="vidcontainer" style="left: 0px; top: 0px; width: 1280px; height: 720px;"></div>
<div style="left: 0px; top: 0px; width: 1280px; height: 720px;">
  <div id="vidpostxt" class="txtdiv" style="left: 480px; top: 430px; width: 320px; height: 30px; color: #ffffff; display: none;">Expected video position:</div>
  <div id="vidposborder" style="left: 480px; top: 460px; width: 320px; height: 220px; border: 4px solid #ffffff; display: none;"></div>
</div>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">MIT-xperts HBBTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="vidbroadcast">Test 1: start broadcast video</li>
  <li name="getSource">Test 2: get cururent getSource()</li>
  <li name="lcenter">Test 3: lower center</li>
  <li name="full">Test 4: fullscreen (background)</li>
  <li name="vidclip">Test 5: video clipping test</li>
  <li name="vidstop">Test 6: stop video</li>
  <li name="vidstream">Test 7: start streaming video</li>
  <li name="lright">Test 8: lower right</li>
  <li name="togglefs">Test 9: toggle fullscreen mode</li>
  <li name="lcenter">Test 10: lower center</li>
  <li name="full">Test 11: fullscreen (background)</li>
  <li name="vidbroadcast">Test 12: start broadcast video</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
