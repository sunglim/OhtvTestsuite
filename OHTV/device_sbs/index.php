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
  var deviceDom = document.getElementById('deviceObj');
  if (name=='IsLogin_LGTV') {
    try {
      var loginId = deviceDom.IsLogin_LGTV();
      if (loginId !== null) {
        showStatus(true, 'IsLogin_LGTV() returns ( ' + loginId + ' )');
      } else {
        showStatus(true, 'IsLogin_LGTV() returns ( null  )');
      }
    } catch (e) {
      showStatus(false, 'cannot determine IsLogin_LGTV');
    }
  } else if (name=='RequestLogin_LGTV') {
    try {
      var isSuccessToLogin = deviceDom.RequestLogin_LGTV();
      showStatus(true, 'RequestLogin_LGTV() returns ( ' + isSuccessToLogin + ' )');
    } catch (e) {
      showStatus(false, 'cannot determine RequestLogin_LGTV');
    }
  } else if (name=='RequestSignup_LGTV') {
    try {
      var isSuccessToSignup = deviceDom.RequestSignup_LGTV();
      showStatus(true, 'RequestSignup_LGTV() returns ( ' + isSuccessToSignup + ' )');
    } catch (e) {
      showStatus(false, 'cannot determine RequestSignup_LGTV');
    }
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
  <li name="IsLogin_LGTV">Test 1: IsLogin_LGTV</li>
  <li name="RequestLogin_LGTV">Test 2: RequestLogin_LGTV</li>
  <li name="RequestSignup_LGTV">Test 3: RequestSignup_LGTV</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
