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
	var obj_ta = document.formoznam.text;

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
						alert("Najprv musíte oznaèi do bloku text, ktorı chcete formátova.");
						return;
				}
					rng.text = ibTag;
			}
		}
	}
	obj_ta.focus();
	return isClose;
}	