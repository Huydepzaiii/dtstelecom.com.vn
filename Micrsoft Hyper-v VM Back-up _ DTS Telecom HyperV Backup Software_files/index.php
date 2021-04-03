//===============================
// Kayako LiveResponse
// Copyright (c) 2001-2019

// http://www.kayako.com
// License: http://www.kayako.com/license.txt
//===============================

var sessionid_haufwgmd = "6ju328wk5wb368wkn0bx78wkii8bm8wk";
var geoip_haufwgmd = new Array();
geoip_haufwgmd[3] = "VDC";
geoip_haufwgmd[4] = "VietNam Data Communication Company (VDC)";
geoip_haufwgmd[2] = "";
geoip_haufwgmd[5] = "VN";
geoip_haufwgmd[12] = "Vietnam";
geoip_haufwgmd[6] = "20";
geoip_haufwgmd[1] = "Ho Chi Minh City";
geoip_haufwgmd[7] = "";
geoip_haufwgmd[8] = "10.8142";
geoip_haufwgmd[9] = "106.6438";
geoip_haufwgmd[10] = "";
geoip_haufwgmd[11] = "";
geoip_haufwgmd[13] = "";

var hasnotes_haufwgmd = "0";
var isnewsession_haufwgmd = "1";
var repeatvisit_haufwgmd = "1";
var lastvisittimeline_haufwgmd = "1562900034";
var lastchattimeline_haufwgmd = "0";
var isfirsttime_haufwgmd = 1;
var timer_haufwgmd = 0;
var imagefetch_haufwgmd = 19;
var updateurl_haufwgmd = "";
var screenHeight_haufwgmd = window.screen.availHeight;
var screenWidth_haufwgmd = window.screen.availWidth;
var colorDepth_haufwgmd = window.screen.colorDepth;
var timeNow = new Date();
var referrer = escape(document.referrer);
var windows_haufwgmd, mac_haufwgmd, linux_haufwgmd;
var ie_haufwgmd, op_haufwgmd, moz_haufwgmd, misc_haufwgmd, browsercode_haufwgmd, browsername_haufwgmd, browserversion_haufwgmd, operatingsys_haufwgmd;
var dom_haufwgmd, ienew, ie4_haufwgmd, ie5_haufwgmd, ie6_haufwgmd, ie7_haufwgmd, ie8_haufwgmd, moz_rv_haufwgmd, moz_rv_sub_haufwgmd, ie5mac, ie5xwin, opnu_haufwgmd, op4, op5_haufwgmd, op6_haufwgmd, op7_haufwgmd, op8_haufwgmd, op9_haufwgmd, op10_haufwgmd, saf_haufwgmd, konq_haufwgmd, chrome_haufwgmd, ch1_haufwgmd, ch2_haufwgmd, ch3_haufwgmd;
var appName_haufwgmd, appVersion_haufwgmd, userAgent_haufwgmd;
var appName_haufwgmd = navigator.appName;
var appVersion_haufwgmd = navigator.appVersion;
var userAgent_haufwgmd = navigator.userAgent;
var dombrowser = "default";
var isChatRunning_haufwgmd = 0;
var title = document.title;
var proactiveImageUse_haufwgmd = new Image();
windows_haufwgmd = (appVersion_haufwgmd.indexOf('Win') != -1);
mac_haufwgmd = (appVersion_haufwgmd.indexOf('Mac') != -1);
linux_haufwgmd = (appVersion_haufwgmd.indexOf('Linux') != -1);
if (!document.layers) {
	dom_haufwgmd = (document.getElementById ) ? document.getElementById : false;
} else {
	dom_haufwgmd = false;
}
var myWidth = 0, myHeight = 0;
if( typeof( window.innerWidth ) == 'number' ) {
	//Non-IE
	myWidth = window.innerWidth;
	myHeight = window.innerHeight;
} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
	//IE 6+ in 'standards compliant mode'
	myWidth = document.documentElement.clientWidth;
	myHeight = document.documentElement.clientHeight;
} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	//IE 4 compatible
	myWidth = document.body.clientWidth;
	myHeight = document.body.clientHeight;
}
winH = myHeight;
winW = myWidth;
misc_haufwgmd = (appVersion_haufwgmd.substring(0,1) < 4);
op_haufwgmd = (userAgent_haufwgmd.indexOf('Opera') != -1);
moz_haufwgmd = (userAgent_haufwgmd.indexOf('Gecko') != -1);
chrome_haufwgmd=(userAgent_haufwgmd.indexOf('Chrome') != -1);
if (document.all) {
	ie_haufwgmd = (document.all && !op_haufwgmd);
}
saf_haufwgmd=(userAgent_haufwgmd.indexOf('Safari') != -1);
konq_haufwgmd=(userAgent_haufwgmd.indexOf('Konqueror') != -1);

if (op_haufwgmd) {
	op_pos = userAgent_haufwgmd.indexOf('Opera');
	opnu_haufwgmd = userAgent_haufwgmd.substr((op_pos+6),4);
	op5_haufwgmd = (opnu_haufwgmd.substring(0,1) == 5);
	op6_haufwgmd = (opnu_haufwgmd.substring(0,1) == 6);
	op7_haufwgmd = (opnu_haufwgmd.substring(0,1) == 7);
	op8_haufwgmd = (opnu_haufwgmd.substring(0,1) == 8);
	op9_haufwgmd = (opnu_haufwgmd.substring(0,1) == 9);
	op10_haufwgmd = (opnu_haufwgmd.substring(0,2) == 10);
} else if (chrome_haufwgmd) {
	chrome_pos = userAgent_haufwgmd.indexOf('Chrome');
	chnu = userAgent_haufwgmd.substr((chrome_pos+7),4);
	ch1_haufwgmd = (chnu.substring(0,1) == 1);
	ch2_haufwgmd = (chnu.substring(0,1) == 2);
	ch3_haufwgmd = (chnu.substring(0,1) == 3);
} else if (moz_haufwgmd){
	rv_pos = userAgent_haufwgmd.indexOf('rv');
	moz_rv_haufwgmd = userAgent_haufwgmd.substr((rv_pos+3),3);
	moz_rv_sub_haufwgmd = userAgent_haufwgmd.substr((rv_pos+7),1);
	if (moz_rv_sub_haufwgmd == ' ' || isNaN(moz_rv_sub_haufwgmd)) {
		moz_rv_sub_haufwgmd='';
	}
	moz_rv_haufwgmd = moz_rv_haufwgmd + moz_rv_sub_haufwgmd;
} else if (ie_haufwgmd){
	ie_pos = userAgent_haufwgmd.indexOf('MSIE');
	ienu = userAgent_haufwgmd.substr((ie_pos+5),3);
	ie4_haufwgmd = (!dom_haufwgmd);
	ie5_haufwgmd = (ienu.substring(0,1) == 5);
	ie6_haufwgmd = (ienu.substring(0,1) == 6);
	ie7_haufwgmd = (ienu.substring(0,1) == 7);
	ie8_haufwgmd = (ienu.substring(0,1) == 8);
}

if (konq_haufwgmd) {
	browsercode_haufwgmd = "KO";
	browserversion_haufwgmd = appVersion_haufwgmd;
	browsername_haufwgmd = "Konqueror";
} else if (chrome_haufwgmd) {
	browsercode_haufwgmd = "CH";
	if (ch1_haufwgmd) {
		browserversion_haufwgmd = "1";
	} else if (ch2_haufwgmd) {
		browserversion_haufwgmd = "2";
	} else if (ch3_haufwgmd) {
		browserversion_haufwgmd = "3";
	}

	browsername_haufwgmd = "Google Chrome";
} else if (saf_haufwgmd) {
	browsercode_haufwgmd = "SF";
	browserversion_haufwgmd = appVersion_haufwgmd;
	browsername_haufwgmd = "Safari";
} else if (op_haufwgmd) {
	browsercode_haufwgmd = "OP";
	if (op5_haufwgmd) {
		browserversion_haufwgmd = "5";
	} else if (op6_haufwgmd) {
		browserversion_haufwgmd = "6";
	} else if (op7_haufwgmd) {
		browserversion_haufwgmd = "7";
	} else if (op8_haufwgmd) {
		browserversion_haufwgmd = "8";
	} else if (op9_haufwgmd) {
		browserversion_haufwgmd = "9";
	} else if (op10_haufwgmd) {
		browserversion_haufwgmd = "10";
	} else {
		browserversion_haufwgmd = appVersion_haufwgmd;
	}
	browsername_haufwgmd = "Opera";
} else if (moz_haufwgmd) {
	browsercode_haufwgmd = "MO";
	browserversion_haufwgmd = appVersion_haufwgmd;
	browsername_haufwgmd = "Firefox";
} else if (ie_haufwgmd) {
	browsercode_haufwgmd = "IE";
	if (ie4_haufwgmd) {
		browserversion_haufwgmd = "4";
	} else if (ie5_haufwgmd) {
		browserversion_haufwgmd = "5";
	} else if (ie6_haufwgmd) {
		browserversion_haufwgmd = "6";
	} else if (ie7_haufwgmd) {
		browserversion_haufwgmd = "7";
	} else if (ie8_haufwgmd) {
		browserversion_haufwgmd = "8";
	} else {
		browserversion_haufwgmd = appVersion_haufwgmd;
	}
	browsername_haufwgmd = "Internet Explorer";
}

if (windows_haufwgmd) {
	operatingsys_haufwgmd = "Windows";
} else if (linux_haufwgmd) {
	operatingsys_haufwgmd = "Linux";
} else if (mac_haufwgmd) {
	operatingsys_haufwgmd = "Mac";
} else {
	operatingsys_haufwgmd = "Unkown";
}

if (document.getElementById)
{
	dombrowser = "default";
} else if (document.layers) {
	dombrowser = "NS4";
} else if (document.all) {
	dombrowser = "IE4";
}

var proactiveX = 20;
var proactiveXStep = 1;
var proactiveDelayTime = 100;

var proactiveY = 0;
var proactiveOffsetHeight=0;
var proactiveYStep = 0;
var proactiveAnimate = false;

function browserObject_haufwgmd(objid)
{
	if (dombrowser == "default")
	{
		return document.getElementById(objid);
	} else if (dombrowser == "NS4") {
		return document.layers[objid];
	} else if (dombrowser == "IE4") {
		return document.all[objid];
	}
}

function doRand_haufwgmd()
{
	var num;
	now=new Date();
	num=(now.getSeconds());
	num=num+1;
	return num;
}

function getCookie_haufwgmd(name) {
	var crumb = document.cookie;
	var index = crumb.indexOf(name + "=");
	if (index == -1) return null;
	index = crumb.indexOf("=", index) + 1;
	var endstr = crumb.indexOf(";", index);
	if (endstr == -1) endstr = crumb.length;
	return unescape(crumb.substring(index, endstr));
}

function deleteCookie_haufwgmd(name) {
	var expiry = new Date();
	document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT" +  "; path=/";
}

function elapsedTime_haufwgmd()
{
	if (typeof _elapsedTimeStatusIndicator == 'undefined') {
		_elapsedTimeStatusIndicator = 'haufwgmd';
	} else if (typeof _elapsedTimeStatusIndicator == 'string' && _elapsedTimeStatusIndicator != 'haufwgmd') {

		return;
	}


	if (timer_haufwgmd < 3600)
	{
		timer_haufwgmd++;
		imagefetch_haufwgmd++;

		if (imagefetch_haufwgmd > 19) {
			imagefetch_haufwgmd = 0;
			doStatusLoop_haufwgmd();
		}

					setTimeout("elapsedTime_haufwgmd();", 1000);
		
	}
}


var Base64_haufwgmd = {
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64_haufwgmd._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	}
}

function doStatusLoop_haufwgmd() {
	date1 = new Date();
	var _finalPageTitle=Base64_haufwgmd.encode(title);

	var _finalWindowLocation = encodeURIComponent(decodeURIComponent(window.location));
	var _referrerURL = encodeURIComponent(decodeURIComponent(document.referrer));
	updateurl_haufwgmd = "https://kb.ahsay.com/visitor/index.php?/LiveChat/VisitorUpdate/UpdateFootprint/_time="+date1.getTime()+"/_randomNumber="+doRand_haufwgmd()+"/_url="+_finalWindowLocation+"/_isFirstTime="+encodeURIComponent(isfirsttime_haufwgmd)+"/_sessionID="+encodeURIComponent(sessionid_haufwgmd)+"/_referrer="+_referrerURL+"/_resolution="+encodeURIComponent(screenWidth_haufwgmd+"x"+screenHeight_haufwgmd)+"/_colorDepth="+encodeURIComponent(colorDepth_haufwgmd)+"/_platform="+encodeURIComponent(navigator.platform)+"/_appVersion="+encodeURIComponent(navigator.appVersion)+"/_appName="+encodeURIComponent(navigator.appName)+"/_browserCode="+encodeURIComponent(browsercode_haufwgmd)+"/_browserVersion="+encodeURIComponent(browserversion_haufwgmd)+"/_browserName="+encodeURIComponent(browsername_haufwgmd)+"/_operatingSys="+encodeURIComponent(operatingsys_haufwgmd)+"/_pageTitle="+encodeURIComponent(_finalPageTitle)+"/_hasNotes="+encodeURIComponent(hasnotes_haufwgmd)+"/_repeatVisit="+encodeURIComponent(repeatvisit_haufwgmd)+"/_lastVisitTimeline="+encodeURIComponent(lastvisittimeline_haufwgmd)+"/_lastChatTimeline="+encodeURIComponent(lastchattimeline_haufwgmd)+"/_isNewSession="+encodeURIComponent(isnewsession_haufwgmd)+"/_geoIP_3="+encodeURIComponent(geoip_haufwgmd[3])+"/_geoIP_4="+encodeURIComponent(geoip_haufwgmd[4])+"/_geoIP_2="+encodeURIComponent(geoip_haufwgmd[2])+"/_geoIP_5="+encodeURIComponent(geoip_haufwgmd[5])+"/_geoIP_12="+encodeURIComponent(geoip_haufwgmd[12])+"/_geoIP_6="+encodeURIComponent(geoip_haufwgmd[6])+"/_geoIP_1="+encodeURIComponent(geoip_haufwgmd[1])+"/_geoIP_7="+encodeURIComponent(geoip_haufwgmd[7])+"/_geoIP_8="+encodeURIComponent(geoip_haufwgmd[8])+"/_geoIP_9="+encodeURIComponent(geoip_haufwgmd[9])+"/_geoIP_10="+encodeURIComponent(geoip_haufwgmd[10])+"/_geoIP_11="+encodeURIComponent(geoip_haufwgmd[11])+"/_geoIP_13="+encodeURIComponent(geoip_haufwgmd[13]);

	proactiveImageUse_haufwgmd = new Image();
	proactiveImageUse_haufwgmd.onload = imageLoaded_haufwgmd;
	proactiveImageUse_haufwgmd.src = updateurl_haufwgmd;

	isfirsttime_haufwgmd = 0;
}

function startChat_haufwgmd(proactive)
{
	isChatRunning_haufwgmd = 1;

	docWidth = (winW-599)/2;
	docHeight = (winH-679)/2;

		_chatWindowURL = 'https://kb.ahsay.com/visitor/index.php?/LiveChat/Chat/Request/_sessionID=' + sessionid_haufwgmd + '/_proactive=' + proactive + '/_filterDepartmentID=14/_randomNumber=' + doRand_haufwgmd() + '/_fullName=/_email=/_promptType=chat';
	


	chatwindow = window.open(_chatWindowURL,"customerchat"+doRand_haufwgmd(), "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=1,width=599,height=679,left="+docWidth+",top="+docHeight);

	hideProactiveChatData_haufwgmd();
}

function imageLoaded_haufwgmd() {
	if (!proactiveImageUse_haufwgmd)
	{
		return;
	}
	proactiveAction = proactiveImageUse_haufwgmd.width;

	if (proactiveAction == 3)
	{
		doProactiveInline_haufwgmd();
	} else if (proactiveAction == 4) {
		displayProactiveChatData_haufwgmd();
	}
}

function writeInlineRequestData_haufwgmd()
{
	docWidth = (winW-600)/2;
	docHeight = (winH-680)/2;

	var divData = '';
	divData += "<div style=\"float: left; width: 600px; background: #ffffff; border: solid 1px #bcb5a6;\"><iframe width=\"600\" height=\"680\" scrolling=\"auto\" frameborder=\"0\" src=\"\" name=\"inlinechatframe\" id=\"inlinechatframe\">error: no iframe support detected</iframe></div><div style=\"float: left; margin-left: -8px; margin-top: -8px;\"><a href=\"javascript: closeInlineProactiveRequest_haufwgmd();\"><img src=\"https://kb.ahsay.com/__swift/themes/client/images/icon_close.png\" border=\"0\" align=\"absmiddle\" /></a></div>";


	var inlineChatElement = document.createElement("div");
	inlineChatElement.style.position = 'absolute';
	inlineChatElement.style.display = 'none';
	inlineChatElement.style.float = 'left';
	inlineChatElement.style.top = docHeight+'px';
	inlineChatElement.style.left = docWidth+'px';
	inlineChatElement.style.zIndex = 500;

	if (inlineChatElement.style.overflow) {
		inlineChatElement.style.overflow = 'none';
	}

	inlineChatElement.id = 'inlinechatdiv';
	inlineChatElement.innerHTML = divData;

	var proactiveChatContainer = document.getElementById('proactivechatcontainer' + swiftuniqueid);
	proactiveChatContainer.appendChild(inlineChatElement);
}

function writeProactiveRequestData_haufwgmd()
{
	docWidth = (winW-450)/2;
	docHeight = (winH-400)/2;

	var divData = '';
	divData += "<div style=\"float: left; width: 500px; background: #ffffff url(\'https://kb.ahsay.com/__swift/themes/client/images/mainbackground.gif\') repeat; border: solid 1px #bababa;\">	<div style=\"background: #ffffff url(\'https://kb.ahsay.com/__swift/themes/client/images/icon_proactiveuserbackground.gif\') no-repeat bottom left; border: solid 1px #bababa; margin: 8px;\">		<div style=\"text-align: center;margin-top: 15px;margin-bottom: 10px;\"><img align=\"absmiddle\" border=\"0\" src=\"https://kb.ahsay.com/__swift/files/file_a57ff1nhuf88l1n.png\"></div>		<hr style=\"border: solid #d8dbdf; border-width: 1px 0 0; clear: both; height: 0; margin: 0; text-align: center\">		<div style=\"padding-left: 100px; text-align: center; margin-top: 20px; height: 60px; overflow: hidden; font: 40px \'segoe ui\',\'helvetica neue\', arial, helvetica, sans-serif; color: #128dbe;width: 350px;\">			Can I help you?		</div>		<div style=\"padding-left: 100px; vertical-align: top; margin-top: 0px; padding-top: 0px; height: 180px; font: 18pt \'segoe ui\',\'helvetica neue\', arial, helvetica, sans-serif; color: #4c5156;width: 350px;\">			Need Assistance? Click \"Chat Now\" to chat with a Live Operator.<br>			<div style=\"padding-top: 30px; padding-left: 90px; text-align: center;\">				<div onclick=\"javascript:doProactiveRequest_haufwgmd();\" style=\"font-weight: normal;font-size: 19px;color: #5d9928;padding: 10px 25px 10px 25px;background-color: #fff;background: -moz-linear-gradient(top,#fafafa 0%,#e7ebf0);background: -webkit-gradient(linear, left top, left bottom, from(#ffffff),to(#f3f3f3));-moz-border-radius: 3px;-webkit-border-radius: 3px;border-radius: 3px;border: 1px solid #cdd2d4;-moz-box-shadow: 0px 1px 1px #f8f8f8,inset 0px 1px 1px #fff;-webkit-box-shadow: 0px 1px 1px #f8f8f8,inset 0px 1px 1px #fff;box-shadow: 0px 1px 1px #f8f8f8,inset 0px 1px 1px #fff;text-shadow: 0px 1px 0px #fff;cursor: pointer;width: 100px;\">					Chat Now				</div>			</div>		</div>	</div></div><div style=\"float: left; margin-left: -8px; margin-top: -8px;\">	<a href=\"javascript:closeProactiveRequest_haufwgmd();\"><img align=\"absmiddle\" border=\"0\" src=\"https://kb.ahsay.com/__swift/themes/client/images/icon_close.png\"></a></div>";


	var proactiveElement = document.createElement("div");
	proactiveElement.style.position = 'absolute';
	proactiveElement.style.display = 'none';
	proactiveElement.style.float = 'left';
	proactiveElement.style.top = docHeight+'px';
	proactiveElement.style.left = docWidth+'px';
	proactiveElement.style.zIndex = 500;

	if (proactiveElement.style.overflow) {
		proactiveElement.style.overflow = 'none';
	}

	proactiveElement.id = 'proactivechatdiv';
	proactiveElement.innerHTML = divData;

	var proactiveChatContainer = document.getElementById('proactivechatcontainer' + swiftuniqueid);
	proactiveChatContainer.appendChild(proactiveElement);
}

function displayProactiveChatData_haufwgmd()
{
	if (proactiveAnimate == true) {
		return false;
	}

	writeObj = browserObject_haufwgmd("proactivechatdiv");
	if (writeObj)
	{
		docWidth = (winW-450)/2;
		docHeight = (winH-400)/2;
		proactiveY = docHeight;
		writeObj.top = docWidth;
		writeObj.left = docHeight;
		proactiveAnimate = true;
	}

	showDisplay_haufwgmd("proactivechatdiv");

		animateProactiveDiv_haufwgmd();
	
}

function displayInlineChatData_haufwgmd()
{
	writeObj = browserObject_haufwgmd("inlinechatdiv");
	if (writeObj)
	{
		docWidth = (winW-600)/2;
		docHeight = (winH-680)/2;
		proactiveY = docHeight;
		writeObj.top = docHeight;
		writeObj.left = docWidth;

		acceptProactive = new Image();
		acceptProactive.src = "https://kb.ahsay.com/visitor/index.php?/LiveChat/VisitorUpdate/AcceptProactive/_randomNumber="+doRand_haufwgmd()+"/_sessionID="+sessionid_haufwgmd;

		inlineChatFrameObj = browserObject_haufwgmd("inlinechatframe");
		_iframeURL = 'https://kb.ahsay.com/visitor/index.php?/LiveChat/Chat/StartInline/_sessionID=6ju328wk5wb368wkn0bx78wkii8bm8wk/_proactive=1/_filterDepartmentID=14/_fullName=/_email=/_inline=1/';
		if (inlineChatFrameObj && inlineChatFrameObj.src != _iframeURL && writeObj.style.display == 'none') {
			inlineChatFrameObj.src = _iframeURL;
		}
	}

	showDisplay_haufwgmd("inlinechatdiv");
}

function hideProactiveChatData_haufwgmd()
{
	hideDisplay_haufwgmd("proactivechatdiv");
	hideDisplay_haufwgmd("inlinechatdiv");
}

function doProactiveInline_haufwgmd()
{
	displayInlineChatData_haufwgmd();
}

function doProactiveRequest_haufwgmd()
{
	acceptProactive = new Image();
	acceptProactive.src = "https://kb.ahsay.com/visitor/index.php?/LiveChat/VisitorUpdate/AcceptProactive/_randomNumber="+doRand_haufwgmd()+"/_sessionID="+sessionid_haufwgmd;

	startChat_haufwgmd("4");
}

function closeProactiveRequest_haufwgmd()
{
	rejectProactive = new Image();
	date1 = new Date();
	proactiveAnimate = false;
	rejectProactive.src = "https://kb.ahsay.com/visitor/index.php?/LiveChat/VisitorUpdate/ResetProactive/_time="+date1.getTime()+"/_randomNumber="+doRand_haufwgmd()+"/_sessionID="+sessionid_haufwgmd;

	hideProactiveChatData_haufwgmd();
}

function closeInlineProactiveRequest_haufwgmd()
{
	rejectProactive = new Image();
	date1 = new Date();
	rejectProactive.src = "https://kb.ahsay.com/visitor/index.php?/LiveChat/VisitorUpdate/ResetProactive/_time="+date1.getTime()+"/_randomNumber="+doRand_haufwgmd()+"/_sessionID="+sessionid_haufwgmd;
	var bodyElement = document.getElementsByTagName('body');

	document.getElementById('inlinechatframe').contentWindow.CloseProactiveChat();
//	window.frames.inlinechatframe.CloseProactiveChat();

	if (bodyElement[0])
	{
		var inlineDivElement = browserObject_haufwgmd('inlinechatdiv');
		if (inlineDivElement) {
			var _parentNode = inlineDivElement.parentNode;
			_parentNode.removeChild(inlineDivElement);
		}
	}
}

function switchDisplay_haufwgmd(objid)
{
	result = browserObject_haufwgmd(objid);
	if (!result)
	{
		return;
	}

	if (result.style.display == "none")
	{
		result.style.display = "block";
	} else {
		result.style.display = "none";
	}
}

function hideDisplay_haufwgmd(objid)
{
	result = browserObject_haufwgmd(objid);
	if (!result)
	{
		return;
	}

	result.style.display = "none";
}

function showDisplay_haufwgmd(objid)
{
	result = browserObject_haufwgmd(objid);
	if (!result)
	{
		return;
	}

	result.style.display = "block";
}

function updateProactivePosition_haufwgmd()
{
	writeObj = browserObject_haufwgmd("proactivechatdiv");
	writeObjInline = browserObject_haufwgmd("inlinechatdiv");

	docHeight = (winH-412)/2;
	docHeightInline = (winH-680)/2;

	finalTopValue = docHeight + document.body.scrollTop;
	if (finalTopValue < 0) {
		finalTopValue = 10;
	}

	finalTopValueInline = docHeightInline + document.body.scrollTop;
	if (finalTopValueInline < 0) {
		finalTopValueInline = 10;
	}

	if (writeObj) {
		writeObj.style.top = finalTopValue + "px";
	}

	if (writeObjInline) {
		writeObjInline.style.top = finalTopValueInline + "px";
	}
}

function animateProactiveDiv_haufwgmd()
{
	writeObj = browserObject_haufwgmd("proactivechatdiv");

	if (!writeObj) {
		return false;
	}

	if(proactiveYStep == 0){proactiveY = proactiveY-proactiveXStep;} else {proactiveY = proactiveY+proactiveXStep;}

	proactiveOffsetHeight = writeObj.offsetHeight;
	if(proactiveY < 0){proactiveYStep = 1; proactiveY=0; }
	if(proactiveY >= (myHeight - proactiveOffsetHeight)){proactiveYStep=0; proactiveY=(myHeight-proactiveOffsetHeight);}

	finalTopValue = proactiveY+document.body.scrollTop;
	if (finalTopValue < 0) {
		finalTopValue = 10;
	}

	writeObj.style.top = finalTopValue+"px";

	if (proactiveAnimate) {
		setTimeout('animateProactiveDiv_haufwgmd()', proactiveDelayTime);
	}
}

	writeProactiveRequestData_haufwgmd(); writeInlineRequestData_haufwgmd();


elapsedTime_haufwgmd();

var oldEvtScroll = window.onscroll; window.onscroll = function() { if (oldEvtScroll) { updateProactivePosition_haufwgmd(); } }

var swifttagdiv=document.createElement("div");swifttagdiv.innerHTML = "<style type=\"text/css\">#kayako_sitebadgebg:hover {	background-color: #bec0c5 !important;}#kayako_sitebadgebg {	background-color: #a2a4ac;	border-color: #bec0c5 #717378 #717378 #717378 !important;}</style><div id=\"kayako_sitebadgecontainer\" title=\"Live Chat is offline. Click here to leave a message.\" onclick=\"javascript: startChat_haufwgmd(\'0\');\" style=\"background: transparent none repeat scroll 0 0; bottom: 0; cursor:pointer; height: 101px; left: 0; line-height: normal; margin: 0; padding: 0; position: fixed; top: 35% !important; z-index: 4000000000 !important;\">	<div id=\"kayako_sitebadgeholder\">		<div id=\"kayako_sitebadgeindicator\" style=\"background: transparent url(https://kb.ahsay.com/__swift/themes/client/images/icon_badge_gray.png) no-repeat scroll 0 0; width: 30px; height: 30px; line-height: normal; margin: 0; padding: 0; position: absolute; left: 10px; top: -8px; z-index: 20000;\"></div>		<div id=\"kayako_sitebadgebg\" id=\"kayako_sitebadgebg\" style=\"background-color: #a2a4ac; border-color: #bec0c5 #717378 #717378 #717378 !important; background-image: url(https://kb.ahsay.com/__swift/themes/client/images/badge_livehelp_en_white.png); background-position: 1px 8px; background-repeat: no-repeat; -moz-border-radius: 0 1em 1em 0 !important; border-radius: 0 1em 1em 0 !important; -webkit-border-radius: 0 1em 1em 0 !important; border-style: outset outset outset none !important; border-width: 1px 1px 1px medium !important; height: 101px !important; left: 0 !important; margin: 0 !important; opacity: 0.90 !important; padding: 0 !important; position: absolute !important; top: 0 !important; width: 30px !important; z-index: 19999 !important;\"></div>	</div></div>";document.getElementById("swifttagdatacontainerkpadt6r53j").appendChild(swifttagdiv);