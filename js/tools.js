function clock(submitBtn) {
	submitBtn.disabled = "disabled";
	var myTimer = setInterval(myClock, 1000);
	var c = 10;
	++c;

    function myClock() {
		--c;
		submitBtn.value = c + " Bitte warten";
		if (c == 0) {
			clearInterval(myTimer);
			submitBtn.value = "Verschlüsseln & Link abrufen";
			submitBtn.removeAttribute("disabled");
			document.getElementById("input1").value = "";
		}
	}
}

function copyText(element) {
	var range, selection, worked;

	if(document.body.createTextRange) {
		range = document.body.createTextRange();
		range.moveToElementText(element);
		range.select();
	} else if(window.getSelection) {
		selection = window.getSelection();        
		range = document.createRange();
		range.selectNodeContents(element);
		selection.removeAllRanges();
		selection.addRange(range);
	}

	try {
		document.execCommand('copy');
		alert('URL wurde in die Zwischenablage kopiert.');
	}
	catch (err) {
		alert('URL konnte nicht kopiert werden. Kopiere die URL manuell.');
	}
	result.removeEventListener("click");
}
