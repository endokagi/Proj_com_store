// JavaScript Document

/* function ไม่ให้พิมพ์ตัวอักษร */
/* วิธีใช้งาน */
/*onKeyPress="return CheckNumKey(window.event.keyCode);"*/
function CheckNumKey(key){
   if ( ((key < 48) || (key > 57)) && (key != 13))
	return false;
   else
	return true;
}

/* function ไม่ให้พิมพ์ตัวเลข */
/* วิธีใช้งาน */
/*onKeyPress="return CheckFloatKey(window.event.keyCode);"*/
function CheckFloatKey(key){
   if ( ((key < 48) || (key > 57)) && (key != 13) && (key != 46) )
	return false;
   else
	return true;
}

/* FUNCTION เปลี่ยน Enter เป็น Tab */
/* วิธีใช้งาน */
/*onKeyDown="Enter2Tab(document.formname.textname);" */
function Enter2Tab(){
	if ((event.which && event.which == 13) || (event.keyCode && event.keyCode == 13)) 
{
  event.keyCode=9;
}
}

/* FUNCTION DELETE STRING */
/* วิธีใช้งาน */
/*onKeyDown="DelChar(document.formname.textname);" */
function DelChar(a){
	var b = a.value.length - 1;
	if(event.keycode == 9){
		a.value = a.value.substring(0, b);
	}
}

/* FUNCTION FORMAT PID */
/* วิธีใช้งาน */
/*onKeyPress="PidDash(document.formname.textname);" */
function PidDash(a) {
var b = a.value.length;
		switch(b) {
			case 1 : case 6 : case 12 : case 15 : 
			a.value = a.value + "-";
		}
}


/*FUNCTION FORMAT DATE*/
/* วิธีใช้งาน */
/*onKeyPress="DateDash(document.formname.textname);" */
function DateDash(a) {
var b = a.value.length;
		switch(b) {
			case 2 : case 5 :
			a.value = a.value + "/";
		}
}

function msgAlert(msg){
	alert(msg);
}