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
  } else if (name=='getSource') {
    try{
      var source = document.getElementById('video').getSource();
      showStatus(true, 'tvcontrol.getSource() returns ( '+source+' ). Check TV Screen is visible(=1) or invisible(=0)',true);
    }catch(e){
        showStatus(false, 'unable to determine tvcontrol.getSource() ');
    }
  } else if (name=='vidbroadcast') {
    govid();
  } else if (name=='vidstop') {
    try {
      document.getElementById('video').setSource(0);
      showStatus(true, 'Video should now be stopped.');
    } catch (e) {
      showStatus(false, 'Stopping video failed.');
    }
    showVideoPosition(false);
  } else if (name=='setSource1') {
    try {
      document.getElementById('video').setSource(1);
      showStatus(true, 'Video should now be played again.');
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

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">OHTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="vidbroadcast">Test 1: start broadcast video</li>
  <li name="getSource">Test 2: get cururent getSource()</li>
  <li name="vidstop">Test 3: setSource(0) </li>
  <li name="getSource">Test 4: get cururent getSource() again</li>
  <li name="setSource1">Test 5: setSource(1) </li>
  <li name="getSource">Test 6: get cururent getSource() again</li>
  <li name="full">Test 7: fullscreen (background)</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
