<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

?>
<script type="text/javascript">
//<![CDATA[
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
  if (name=='width_height') {
    try {
      var video = document.getElementById('video');
      if(video.width == 320 && video.height == 180){
        showStatus(true,'correct value returns; width = ' + video.width + ' height = ' + video.height);
      }else{
        showStatus(false,'incorrect value returned; width = ' + video.width + ' height = ' + video.height);
      }
    } catch (e) {
      showStatus(false, 'cannot determine width and height property ');
    }
  } else if (name=='getSource') {
    try{
      var video = document.getElementById('video');
      if (video.getSource() == 1) {
        showStatus(true,'getSource returns ' + video.getSource());
      } else {
        showStatus(false,'getSource returns ' + video.getSource() + " But should return 1" );
      }
    } catch (e) {
      showStatus(false,'cannot determine getSource()');
    }

  } else if (name=='majorNumber') {
    try{
      var video = document.getElementById('video');
      if(video.currentMajorChannelNumber === undefined){
        showStatus(false,'cannot determine currentMajorChannelNumber');
        return;
      }
      showStatus(true,'currentMajorChannelNumber returns ' + video.currentMajorChannelNumber + '<br/> Check current Major channel of TV is ' + video.currentMajorChannelNumber ,true);
    } catch (e) {
      showStatus(false,'cannot determine currentMajorChannelNumber');
    }
  } else if (name=='minorNumber') {
    try{
      var video = document.getElementById('video');
      if(video.currentMinorChannelNumber === undefined){
        showStatus(false,'cannot determine currentMinorChannelNumber');
        return;
      }
      showStatus(true,'currentMinorChannelNumber returns ' + video.currentMinorChannelNumber + '<br/> Check current Minor channel of TV is ' + video.currentMinorChannelNumber ,true);
    } catch (e) {
      showStatus(false,'cannot determine currentMinorChannelNumber');
    }
  }
}

//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<?php echo videoObject(100, 480, 320, 180) ?>

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">OHTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="width_height">Test 1: width and height property</li>
  <li name="majorNumber">Test 2: currentMajorChannelNumber property</li>
  <li name="minorNumber">Test 3: currentMinorChannelNumber property</li>
  <li name="getSource">Test 4: getSource()</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
