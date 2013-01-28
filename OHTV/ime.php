<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title> OHTV Application Template </title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<script type="text/javascript" src="../keycodes.js"></script>

<script type="text/javascript">
window.onload = function(){
  registerKeyEventListener();
};
var setCallbackFunc = function(){
	try{
		var imeObjs = document.getElementById("imeObj");
		writeLogToGraphicDiv("try register callback ");
		imeObjs.onIMECallback = onImeCallback;
	}catch(err){
		writeLogToGraphicDiv("ERROR : " + err.message);
	};
}

var onImeCallback = function(status){
	writeLogToGraphicDiv("imeObj.onImeCallback!(1-OK/0-Canceled) : " + status);
}

var getStringIme = function(){
 	try{
		var getImeStr = imeObj.GetString() + "";
		
		writeLogToGraphicDiv("imeObj.GetString() : " + getImeStr);
		writeLogToGraphicDiv("imeObj.IME_CALLBACK_OK : " + imeObj.IME_CALLBACK_OK);
		writeLogToGraphicDiv("imeObj.IME_CALLBACK_CANCEL : " + imeObj.IME_CALLBACK_CANCEL);
	}catch(err){
		writeLogToGraphicDiv("ERROR : " + err.message);
	};
}
var setStringIme = function(){
	try{
		var getImeStr = imeObj.SetString('IME test text') + "";
		
		writeLogToGraphicDiv("imeObj.SetString('IME test text') : " + getImeStr);
	}catch(err){
		writeLogToGraphicDiv("ERROR : " + err.message);
	};
}
var runObjTest_ = function(type_){
	var imeObj = document.getElementById("imeObj");
	
	try{
		var getImeStr = imeObj.InitIME(20,type_) + "";
		
		writeLogToGraphicDiv("imeObj.InitIME(20,0) : " + getImeStr);
	}catch(err){
		writeLogToGraphicDiv("initIme ERROR : " + err.message);
	};
	
	/*
	try{
		var getImeStr = imeObj.DeInitIME() + "";
		
		writeLogToGraphicDiv("imeObj.DeInitIME() : " + getImeStr);
	}catch(err){
		writeLogToGraphicDiv("ERROR : " + err.message);
	};*/
	
};

var writeLogToGraphicDiv = function(msg){
		document.getElementById("divGraphic").innerHTML += "<br/>"+ msg;
};

function registerKeyEventListener() {
  document.addEventListener("keydown", function(e) {
    if (handleKeyCode(e.keyCode)) {
      e.preventDefault();
    }
  }, false);
};

function handleKeyCode(kc) {
	if(kc==VK_BACK) {
		window.history.back();
		return true;
	}else if(kc==VK_RED) {
		runObjTest_(0);
		return true;
	}else if(kc==VK_BLUE) {
		runObjTest_(1);
		return true;
	}else if(kc==VK_YELLOW) {
		setStringIme();
		return true;
	}else if(kc==VK_GREEN) {
		getStringIme();
		return true;
	}else if(kc==VK_DOWN) {
		setCallbackFunc();
		return true;
	}
	
  return false;
};

</script>
</head>

<body>
1. YELLOW 키를 입력하여 SetString을 호출함<br/>
 -> plugin의 버퍼에 문자열(IME test text)를 저장함<br/>
 -> OHIF_JS_IME_SetText("IME test text")도 호출함<p>
2. DOWN 키를 입력하여 callback함수를 등록함<br/>
 -> plugin에서만 처리<p>
3. <span style="color: blue;">BLUE(비번모드)</span>/<span style="color: red;">RED(일반모드)</span> 키를 입력하여 InitIME()를 호출함<br/>
 -> OHIF_JS_IME_Open(OHIF_JS_IME_LO_GENERAL, FALSE, TRUE)<br />
 -> OHIF_JS_IME_SetText("IME test text")를 한번더 호출함<p>
 -> <b>IME에 1번에서 호출한 문자열(IME test text)가 IME에 출력되어야함</b><p>
5. IME에 글자를 입력하고 확인버튼을 누름<p>
6. callback메시지가 출력되는지 확인<p>
7. GREEN키를 입력하여 메시지가 출력되는지 확인<p>
 -> 플러그인버퍼의 문자열에서 처리<br/>
 -> 한글도 출력이되어야함<br/>


<!-- device object -->
<object id="imeObj" type="application/x-ohtv-ime" style="position:absolute;top:280px;left:20px;width:300px;height:140px"></object>

<div style="left: 0px; top: 0px; width: 1280px; height: 720px;  position:absolute; background-color: #F7E9E9; border:1px solid #c33;  z-index:-1;"></div>

<div id="divGraphic" style="left: 628px; top: 10px; width: 1024px; height: 648px; position:absolute; z-index:1;"></div>

</body>
</html>
