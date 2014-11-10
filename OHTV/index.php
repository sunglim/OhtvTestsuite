<?php
$ROOTDIR='.';
require("$ROOTDIR/base.php");
$referer = $_SERVER['HTTP_REFERER'];
$i = strrpos($referer, '/');
$referer = substr($referer, 0, $i);
$referer = substr(strrchr($referer, '/'), 1);
$referer = addcslashes($referer, "\0..\37'\\");

sendContentType();
openDocument();
?>
<script type="text/javascript">
//<![CDATA[
window.onload = function() {
  menuInit();
  initVideo();
  registerKeyEventListener();
  setDescr();
  initApp();
  nameselect('<?php echo $referer; ?>');
  document.getElementById('relid').innerHTML = releaseinfo;
  document.getElementById('deviceObj').SetAppMode(3);
};
function nameselect(snam) {
  if (!snam) return;
  for (var i=0; i<opts.length; i++) {
    var check = opts[i].getAttribute('name');
    if (check==snam) {
      menuSelect(i);
      setDescr();
      break;
    }
  }
}
function handleKeyCode(kc) {
  if (kc==VK_UP) {
    menuSelect(selected-1);
    setDescr();
    return true;
  } else if (kc==VK_DOWN) {
    menuSelect(selected+1);
    setDescr();
    return true;
  } else if (kc==VK_LEFT){
    menuSelect(selected-6);
    setDescr();
    return true;
  } else if (kc==VK_RIGHT){
    menuSelect(selected+6);
    setDescr();
    return true;
  } else if (kc==VK_ENTER) {
    var liid = opts[selected].getAttribute('name');
    if (liid=='exit') {
      closeApp();
    } else {
      document.location.href = liid+'/';
    }
    return true;
  } else if (kc==VK_0) {
    closeApp();
    return true;
  } else if (kc==VK_5) {
    document.location.href = 'http://itv.mit-xperts.com/';
  }
  return false;
}
function setDescr() {
  document.getElementById('descr').innerHTML = opts[selected].getAttribute('descr');
}
function closeApp() {
}
//]]>
</script>

</head><body>
<object id='deviceObj' type='application/x-ohtv-device'/>
<div style="left: 0px; top: 0px; width: 1280px; height: 720px; background-color: #132d48;" />
<div class="txtdiv txtlg" style="left: 111px; top: 60px; width: 500px; height: 30px;">테스트 한글 LG OHTV testsuite</div>
<div class="txtdiv" style="left: 111px; top: 640px; width: 500px; height: 30px;">Testsuite release: <span id="relid"></span></div>
<div style="left: 690px; top: 56px; width: 590px; height: 210px; background-color: #ffffff;">
  <div class="txtdiv" style="left: 10px; top: 4px; width: 500px; height: 30px; color: #000000;">OHTV testsuite platform is made by :</div>
  <div class="imgdiv" style="left: 10px; top: 34px; width: 356px; height: 44px; background-image: url(logo.png);"></div>
  <div class="txtdiv" style="left: 10px; top: 94px; width: 500px; height: 30px; color: #000000;">OHTV testsuite is modified and being maintained by :</div>
  <div class="imgdiv" style="left: 10px; top: 124px; width: 356px; height: 54px; background-image: url(lg_logo.gif);"></div>
</div>
<div class="txtdiv" style="left: 700px; top: 270px; width: 450px; height: 400px;"><u>Instructions:</u><br />
Please select the desired test using the cursor keys, then press OK. After that, test-specific instructions will appear. More information is available under &quot;About / Imprint&quot;.<br />
In case you have questions and/or comments, you can reach us at ohtv-dev@lge.com<br /><br />
<u>Test description:</u><br />
<span id="descr">&#160;</span>
</div>
<ul id="menu" class="menu" style="left: 100px; top: 100px;">
  <li name="device" descr="Get and Set Device Info.">Get device info</li>
  <li name="device_sbs" descr="Device for SBS Pooq.">Device for SBS Pooq</li>
  <li name="tvcontrol" descr="Get properties of tvcontrol object.">Get TV Control properties</li>
  <li name="tvcontrolgetset" descr="getSource and setSource">Get and set TV Control source</li>
  <li name="network" descr="Get and Check Network">Get and Check Network</li>
  <li name="ime" descr="Check IME function">Check IME function(dev)</li>
  <li name="videocontrol" descr="Sets the play speed and play position on a streaming video.">Video controls(dev)</li>
  <li name="keypress" descr="Check whether keypress event is sent for non-unicode characters.">Keypress events</li>
  <li name="keycodes" descr="Check for correctly defined key codes and key events.">Key codes / key events</li>
  <li name="mouse" descr="Mouse event test">Mouse</li>
  <li name="mousescroll" descr="Mouse Wheel event test">Mouse scroll</li>
  <li name="videoformats" descr="Check whether videos from various applications run on your device.">Streaming video/audio formats</li>
  <li name="playerevents" descr="Checks if streaming video playback sends correect events.">Streaming video playback events</li>
  <li name="useragent" descr="Validate user agent.">User agent</li>
  <li name="capabilities" descr="Check the application/oipfCapabilities object.">OIPF Capabilities</li>
<!-- TODO: We need to migrate belows.
  <li name="videoscale" descr="Exchange the video object on the page, switch between broadcast and streaming video. For both, scale the video object.">Video swapping and scaling</li>
  <li name="videobackground" descr="Broadcast video in background without own video object.">Broadcast in background</li>
  <li name="keyset" descr="Set keyset mask for user-input keys.">Keyset mask</li>
  <li name="configuration" descr="Check the application/oipfConfiguration object.">OIPF Configuration</li>
  <li name="parentalcontrol" descr="Check the application/oipfParentalControlManager object.">OIPF Parental Control</li>
  <li name="navigatordebug" descr="Check access to the Navigator class and the Debug print API.">Navigator and Debug</li>
  <li name="fontrendering" descr="Check whether the device performs correct font rendering.">Font rendering</li>
  <li name="clientssl" descr="Check support for client SSL certificates.">Client SSL certificate</li>
  <li name="cookies" descr="Store and read cookies in JavaScript.">Cookies</li>
  <li name="datetime" descr="Check whether box has correct date and time.">Date and time</li>
  <li name="animation" descr="Check the performance of a Set-Top-Box graphics renderer.">Animation</li>
  <li name="animgif" descr="Check animated GIF.">Animated GIF</li>
-->
</body>
</html>
