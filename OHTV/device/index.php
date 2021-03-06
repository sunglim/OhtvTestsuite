<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

  $uagent = $_SERVER['HTTP_USER_AGENT'];
?>
<script type="text/javascript">
//<![CDATA[
window.onload = function() {
  menuInit();
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
  if (name=='getDuid') {
    try {
      var deviceDom = document.getElementById('deviceObj');
      showStatus(true, 'GetDUID() returns ( ' + deviceDom.GetDUID() + ' )');
    } catch (e) {
      showStatus(false, 'cannot determine GetDUID ');
    }
  } else if (name=='getFirmware') {
    try {
      var deviceDom = document.getElementById('deviceObj');
      showStatus(true, 'GetFirmware() returns ( ' + deviceDom.GetFirmware() + ' )');
    } catch (e) {
      showStatus(false, 'cannot determine GetFirmware ');
    }
  } else if (name=='getModelCode') {
    try {
      var deviceDom = document.getElementById('deviceObj');
      showStatus(true, 'GetModelCode() returns ( ' + deviceDom.GetModelCode() + ' )');
    } catch (e) {
      showStatus(false, 'cannot determine GetModelCode() ');
    }
  } else if (name=='getProfileInfo') {
    try {
      var deviceDom = document.getElementById('deviceObj');
      showStatus(true, 'GetProfileInfo() returns ( ' + deviceDom.GetProfileInfo() + ' )');
    } catch (e) {
      showStatus(false, 'cannot determine GetProfileInfo() ');
    }
  } else if (name=='useragent') {
    var ua = '<?php echo $uagent ?>';
    showStatus(true, 'useragent returns [[[ ' + ua + ' ]');
  }
}

//]]>
</script>

</head><body>

<object id="deviceObj" type="application/x-ohtv-device"></object>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">LG OHTV tests - Device</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="getDuid">Test 1: GetDUID</li>
  <li name="getFirmware">Test 2: GetFirmware</li>
  <li name="getModelCode">Test 3: GetModelCode</li>
  <li name="getProfileInfo">Test 4: GetProfileInfo</li>
  <li name="useragent">Test 5: Useragent</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
