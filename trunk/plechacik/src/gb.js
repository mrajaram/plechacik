

function simpletag(thetag)
{
			doInsert("<" + thetag + ">", "</" + thetag + "> ", true);
}
//------------------------------------------------------
var myAgent   = navigator.userAgent.toLowerCase();
var myVersion = parseInt(navigator.appVersion);
var is_ie   = ((myAgent.indexOf("msie") != -1)  && (myAgent.indexOf("opera") == -1));
var is_win   =  ((myAgent.indexOf("win")!=-1) || (myAgent.indexOf("16bit")!=-1));
//------------------------------------------------------
function doInsert(ibTag, ibClsTag, isSingle)
{
	var isClose = false;
	var obj_ta = document.formicka.prispevok;

	if ( (myVersion >= 4) && is_ie && is_win) 
	{
		if(obj_ta.isTextEdit){ // nefunguje pod NS. funguje pre IE4+ a compatible browsers
			obj_ta.focus();
			var sel = document.selection;
			var rng = sel.createRange();
			rng.colapse;
			if((sel.type == "Text" || sel.type == "None") && rng != null){
				if(ibClsTag != "" && rng.text.length > 0)
					ibTag += rng.text + ibClsTag;
				else if(isSingle){
						alert("Najprv mus�te ozna�i� do bloku text, ktor� chcete form�tova�.");
						return;
				}
					rng.text = ibTag;
			}
		}
	}
	obj_ta.focus();
	return isClose;
}	
//-----------------------------------------------
function smiley() {
	document.formicka.prispevok.value += " :smiley: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function wink() {
	document.formicka.prispevok.value += " :wink: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function angry() {
	document.formicka.prispevok.value += " :angry: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function grin() {
	document.formicka.prispevok.value += " :grin: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function sad() {
	document.formicka.prispevok.value += " :sad: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function cry() {
	document.formicka.prispevok.value += " :cry: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function kiss() {
	document.formicka.prispevok.value += " :kiss: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
function undecided() {
	document.formicka.prispevok.value += " :undecided: ";
	document.formicka.prispevok.focus();
	document.formicka.prispevok.value += " ";
}
//-----------------------

