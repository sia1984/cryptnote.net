document.addEventListener("DOMContentLoaded", function(){
	let result = document.getElementById("result");
	let submitBtn = document.getElementById("submitbtn");
	let showLink = document.getElementById("showpgp");

	showLink.addEventListener("click", function(){ 
		document.querySelector("#pgpkey").classList.toggle("hide"); 
		if(showLink.textContent == "[SHOW PGP-KEY]") showLink.textContent = "[CLOSE]";
		else showLink.textContent = "[SHOW PGP-KEY]";
	});

	submitBtn.addEventListener("click", function(e){
        e.preventDefault();
        let message = document.getElementById("input1").value;
        
        if(message.length > 0){
	        message = message.replace(/(<([^>]+)>)/ig,"");
	        message = message.replace(/(?:\r\n|\r|\n)/g, "<br>");
			let password = Math.random().toString(36).substr(2, 8);
			let salt = CryptoJS.lib.WordArray.random(128 / 8);
			let key = CryptoJS.PBKDF2(password, salt, {
				keySize: 256 / 32
			});
	        var encrypted = CryptoJS.AES.encrypt(message, key.toString());
	        document.getElementById("input1").value = encrypted; 
	        let formData = new FormData(document.getElementById("form"));
	        formData.append("_token", document.getElementById("ctoken").value);
	        const xhr = new XMLHttpRequest();
	        xhr.open("post", "post", true); //second is filename
	        xhr.send(formData);       
	        xhr.onreadystatechange = function() {
	          if(xhr.readyState == 4) {
	            	//let response = JSON.parse(xhr.responseText);
	                if(xhr.responseText == "Fehler!" || xhr.responseText == "Bitte warte 10 Minuten."){
	                  	result.innerHTML = xhr.responseText;
	              	} else {
	                  	result.innerHTML = xhr.responseText + "#" + key;
	              		result.addEventListener("click", () => { copyText(result); });
	              		clock(submitBtn);
	              	}
	        	}
	        }
    	} else {
 	 		result.innerHTML = "Fehler!";
 	 	}
	});

}); // end eventlistener DOM Content Loaded

let ascii = `
What are you doing here?
                       .ed"""" """$$$$be.
                   -"           ^""**$$$e.
                 ."                   '$$$c
                /                      "4$$b
               d  3                     $$$$
               $  *                   .$$$$$$
              .$  ^c           $$$$$e$$$$$$$$.
              d$L  4.         4$$$$$$$$$$$$$$b
              $$$$b ^ceeeee.  4$$ECL.F*$$$$$$$
  e$""=.      $$$$P d$$$$F $ $$$$$$$$$- $$$$$$
 z$$b. ^c     3$$$F "$$$$b   $"$$$$$$$  $$$$*"      .=""$c
4$$$$L   \     $$P"  "$$b   .$ $$$$$...e$$        .=  e$$$.
^*$$$$$c  %..   *c    ..    $$ 3$$$$$$$$$$eF     zP  d$$$$$
  "**$$$ec   "\   %ce""    $$$  $$$$$$$$$$*    .r" =$$$$P""
        "*$b.  "c  *$e.    *** d$$$$$"L$$    .d"  e$$***"
          ^*$$c ^$c $$$      4J$$$$$% $$$ .e*".eeP"
             "$$$$$$"'$=e....$*$$**$cz$$" "..d$*"
               "*$$$  *=%4.$ L L$ P3$$$F $$$P"
                  "$   "%*ebJLzb$e$$$$$b $P"
                    %..      4$$$$$$$$$$ "
                     $$$e   z$$$$$$$$$$%
                      "*$c  "$$$$$$$P"
                       ."""*$$$$$$$$bc
                    .-"    .$***$$$"""*e.
                 .-"    .e$"     "*$c  ^*b.
          .=*""""    .e$*"          "*bc  "*$e..
        .$"        .z*"               ^*$e.   "*****e.
        $$ee$c   .d"                     "*$.        3.
        ^*$E")$..$"                         *   .ee==d%
           $.d$$$*                           *  J$$$e*
            """""                             "$$$"
    `;
console.log(ascii);