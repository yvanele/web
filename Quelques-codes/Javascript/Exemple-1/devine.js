d = setTimeout("timeoutHandler()", 3000);

flag = true;

function init() {
	nbadeviner = Math.floor(10*Math.random());
}

function controle(input) {
	if(flag == true) {
		var n = input.value;

		if(isNaN(n)) alert("farceur");
		else if(n > 10) alert("Trop grand !");
		else if(n == nbadeviner) {
			alert("gagne !");
			clearTimeout(d);
			if(window.confirm("Voulez-vous recommencer une partie ?") == true) {
				d = setTimeout("timeoutHandler()", 3000);
				init();
			} else {
				flag = false;
			}
		} else if(n < nbadeviner) alert("c'est plus !");
		else alert("c'est moins !");
	} else {
		alert("Vous avez arrete de jouer.");
	}
}

function timeoutHandler() {
	alert("Temps ecoule.\nGame Over, try again.");
	clearTimeout(d);
}
