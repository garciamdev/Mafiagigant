

function countdown(tijd,id,url){
	if(tijd>0){
		
        		dagen=Math.floor(tijd/3600/24)
        		uren=Math.floor((tijd-dagen*3600*24)/3600)
        		minuten=Math.floor((tijd-dagen*3600*24-uren*3600)/60)
        		seconden=Math.floor(tijd-dagen*3600*24-uren*3600-minuten*60)
 			
        		
    		
			
if(seconden>0 && seconden<10) {
var seconden="0"+seconden
}else if(seconden>9 && seconden<60) {
var seconden=seconden
}else {
var seconden="00"
}	


if(minuten>0 && minuten<10) {
var minuten="0"+minuten+":"
}else if(minuten>9 && minuten<60) {
var minuten=minuten+":"
}else if(uren>0 || dagen>0){
var minuten="00:"
}else {
var minuten="00:"	
}

if(uren>0 && uren<10) {
var uren="0"+uren+":"
}else if(uren>9 && uren<60) {
var uren=uren+":"
}else if(dagen>0){
var uren="00:"
}else {
var uren=""	
}




if(dagen>0 && dagen<10) {
var dagen="0"+dagen+":"
}else if(dagen>9) {
var dagen=dagen+":"
}else {
var dagen=""
}


	

    		
	var zichttijd=dagen+""+uren+""+minuten+""+seconden
 		
    		document.getElementById(id).innerHTML=zichttijd;
	}else{
  		document.getElementById(id).innerHTML="00:00"
  		if(url != '') document.location.href = url
	}

	tijd=tijd-1
	countdownTimer=setTimeout("countdown('"+tijd+"','"+id+"','"+url+"')",1000);

}



