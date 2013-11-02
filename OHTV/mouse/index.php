<?php
$ROOTDIR='..';
require("$ROOTDIR/base.php");
sendContentType();
openDocument();

?>
<style>
div.out { width:40%; height:320px; margin:0 15px;
          background-color:#D6EDFC; float:left; }
div.in {  width:60%; height:60%;
          background-color:#FFCC00; margin:10px auto;
       }
</style>
<script src="../jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
var logtxt = '';

window.onload = function() {
  menuInit();
  registerKeyEventListener();
  initApp();
  setInstr(logtxt);
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
}

function clickme() {
  var text = $("#instr").text() + " clicked!";
  setInstr(text);
}

//]]>
</script>

</head><body>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />

<div class="txtdiv txtlg" style="left: 110px; top: 60px; width: 500px; height: 30px;">MIT-xperts HBBTV tests</div>
<div id="instr" class="txtdiv" style="left: 700px; top: 110px; width: 400px; height: 360px;">
</div>

<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="exit">Return to test menu</li>
</ul>

<div class="out overout" style="left:600px;top:300px;font-size:32px;font-weight:bold;">
<button onclick="clickme()"  type="button">Click me!</button>
  <span>move your mouse</span>
  <div class="in">
  </div>
</div>
<div id="status" style="left: 700px; top: 480px; width: 400px; height: 200px;">
<script type="text/javascript">
  var i = 0;
  $("div.overout").mouseover(function() {
    i += 1;
    $(this).find("span").text( "mouse over x " + i );
  }).mouseout(function(){
    $(this).find("span").text("mouse out ");
  });
</script>
</body>
</html>
