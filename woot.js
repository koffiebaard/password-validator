var nanananananananabatmaaaan; // Timer

function call ( url, domElementID ) {
	
	var xmlhttp;
	
	// Vertellen dat we bezig zijn
	document.getElementById(domElementID).innerHTML = '<img src="woot.gif" />';
	
	// Is het een goede browser? Ga dan verder
	if (window.XMLHttpRequest) {
		
		xmlhttp=new XMLHttpRequest();
	}
	// Is het internet explorer uit het jaar kruik?
	else {
		
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function() {
		
		if ( xmlhttp.readyState==4 && xmlhttp.status==200 ) {
			
			document.getElementById(domElementID).innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("POST", url,true);
	xmlhttp.send();
}

document.getElementById('validate').onclick = function () {
	
	MAKETHECALLBITCHES();
	
	return false;
}

document.getElementById('password').onkeyup = function () {
	
	clearTimeout(nanananananananabatmaaaan);
	nanananananananabatmaaaan = setTimeout("MAKETHECALLBITCHES()",700);
	
	return false;
}

function MAKETHECALLBITCHES () {
	
	call('/wachtwoord-controleren/call.php?password=' + encodeURIComponent(document.getElementById('password').value), "result")
}


$(window).bind( 'hashchange', function(e) {

	handleHash();
});


handleHash();


function handleHash () {

var hash = '#' + window.location.hash.substring(3);

if (hash.length > 1 && hash.substring(0, 9) === "#example-") {
	
	call('/wachtwoord-controleren/examples.php', "examples");

	$("html, body").animate({scrollTop: $(hash).offset().top}, 1500);
}
else if ( hash.length > 1 && hash === "#uitleg" ) {
	
	call('/wachtwoord-controleren/explanation.php', "examples");
	 $("html, body").animate({scrollTop: $('#examples').offset().top}, 1500);
}
else if ( hash.length > 1 && hash === "#voorbeelden" ) {
	
	call('/wachtwoord-controleren/examples.php', "examples");
}
else {
	
	call('/wachtwoord-controleren/examples.php', "examples");
}


}

/*
if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {

	$("body").on("click", ".result > p", function(){
		
		$(this).hover();
	});

}
*/
