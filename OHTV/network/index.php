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
  if (name=='getMac') {
    try {
      var networkDom = document.getElementById('networkObj');
      showStatus(true, 'GetMac(0) returns ( ' + networkDom.GetMac(0) + ' ), GetMac(1) returns ( '+ networkDom.GetMac(1) + ' ), GetMac() returns ( '+networkDom.GetMac() +' )');
    } catch (e) {
      showStatus(false, 'cannot determine GetMac');
    }
  }
}

//]]>
</script>

</head><body>

<object id="networkObj" type="application/x-ohtv-network"></object>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">LG OHTV tests - Device</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;"></div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="getMac">Test 1: GetMac()</li>
  <li name="exit">Return to test menu</li>
</ul>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;"></div>

</body>
</html>
