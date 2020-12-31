<?php
	session_start();
	include_once("includes/vendor/autoload.php");
  	use csrfhandler\csrf as csrf;
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cryptnote: Versende automatisch selbstzerstörende, verschlüsselte Nachrichten">
    <meta name="keywords" content="nachricht, notiz, senden, selbstzerstörende, messages, aes, 256bit, 256, bit, verschlüsselt, verschlüsselung, automatisch, löschen">
    <meta name="wot-verification" content="2a5a37e8432792c13e9c"/>
    <meta property="og:title" content="Cryptnote">
    <meta property="og:description" content="Sende automatisch selbstzerstörende, verschlüsselte Nachrichten">
    <meta property="og:image" content="lock.png">
    <link rel="icon" href="favicon.ico">

    <title>Cryptnote</title>
    <style>
      *, html {
        padding: 0;
        margin: 0;
        font-family: Consolas, monaco, monospace;  
      }
      body {
      	background-color: #0c445c;
      	color: white;
      }
      a {
      	color: white;
      }
      @media only screen and (max-width: 600px){
          #advertise {
            display: none;
          }
          textarea {
            width: 90% !important;
          }
        }
        @media only screen and (min-width: 601px){
          #advertise2 {
            display: none;
          }
        }
      #user {
        padding-top: 10px;
        padding-bottom: 10px;
      }
      form {
        padding-top: 20px;
        padding-left: 20px;
      }
      #result {
        padding-top: 10px;
        padding-left: 20px;
      }
      #info {
        padding-top: 10px;
        padding-left: 20px;
      }
      #ascii {
      	padding-top: 20px;
      	padding-left: 20px;
      	font-size: 8px;
      	color: white;
      }
      h1, h2, p#subtitle {
        padding-top: 10px;
      }
      .hide {
        display: none;
      }
      #ads {
        padding-top: 20px;
        padding-left: 20px;
      }
      .blink {
        animation: blinker 3s linear infinite;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
    #endofpage {
        margin-bottom: 30px;
    }
    .tooltip {
		  position: relative;
		  display: inline-block;
	}
	.tooltip .tooltiptext {
		  visibility: hidden;
		  width: 140px;
		  background-color: #555;
		  color: #fff;
		  text-align: center;
		  border-radius: 6px;
		  padding: 5px;
		  position: absolute;
		  z-index: 1;
		  bottom: 150%;
		  left: 50%;
		  margin-left: -75px;
		  opacity: 0;
		  transition: opacity 0.3s;
	}
	.tooltip .tooltiptext::after {
		  content: "";
		  position: absolute;
		  top: 100%;
		  left: 50%;
		  margin-left: -5px;
		  border-width: 5px;
		  border-style: solid;
		  border-color: #555 transparent transparent transparent;
	}
	.tooltip:hover .tooltiptext {
		  visibility: visible;
		  opacity: 1;
	}
	#advertise {
		margin-left: auto;
		margin-right: auto;
		text-align: center;
	}
  #advertise2 {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
.wrapper {
  width: 90%;
  font-size: 0;
  padding-top: 20px;
  padding-left: 20px;
}

p.subtitle {
  font-family: sans-serif;
  font-size: 14px;
  font-weight: 500;
  color: #eee;
  opacity: 0.3;
  padding-top: 10px;
}

.letter {
  width: 24px;
  display: inline-block;
  vertical-align: middle;
  position: relative;
  overflow: hidden;
  margin: 0 0;
  font-family: sans-serif;
  font-size: 24px;
  font-weight: 600;
  line-height: 24px;
  text-transform: uppercase;
  color: #eee;
}
.letter:before {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  word-break: break-all;
  background-color: #0c445c;
}

.letter:nth-child(1):before {
  content: "5302496718";
  margin-top: -120px;
  -webkit-animation-name: letter1;
          animation-name: letter1;
  -webkit-animation-duration: 1.3333333333s;
          animation-duration: 1.3333333333s;
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter1 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter1 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(2):before {
  content: "6039241578";
  margin-top: -48px;
  -webkit-animation-name: letter2;
          animation-name: letter2;
  -webkit-animation-duration: 2.5866666667s;
          animation-duration: 2.5866666667s;
  -webkit-animation-delay: 0.03s;
          animation-delay: 0.03s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter2 {
  from {
    margin-top: -48px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter2 {
  from {
    margin-top: -48px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(3):before {
  content: "9563842071";
  margin-top: -72px;
  -webkit-animation-name: letter3;
          animation-name: letter3;
  -webkit-animation-duration: 1.05s;
          animation-duration: 1.05s;
  -webkit-animation-delay: 0.65s;
          animation-delay: 0.65s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter3 {
  from {
    margin-top: -72px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter3 {
  from {
    margin-top: -72px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(4):before {
  content: "3564981072";
  margin-top: -72px;
  -webkit-animation-name: letter4;
          animation-name: letter4;
  -webkit-animation-duration: 1.35s;
          animation-duration: 1.35s;
  -webkit-animation-delay: 0.55s;
          animation-delay: 0.55s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter4 {
  from {
    margin-top: -72px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter4 {
  from {
    margin-top: -72px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(5):before {
  content: "3805124769";
  margin-top: -120px;
  -webkit-animation-name: letter5;
          animation-name: letter5;
  -webkit-animation-duration: 0.7333333333s;
          animation-duration: 0.7333333333s;
  -webkit-animation-delay: 0.78s;
          animation-delay: 0.78s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter5 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter5 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(6):before {
  content: "6981257304";
  margin-top: -216px;
  -webkit-animation-name: letter6;
          animation-name: letter6;
  -webkit-animation-duration: 0.072s;
          animation-duration: 0.072s;
  -webkit-animation-delay: 0.98s;
          animation-delay: 0.98s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter6 {
  from {
    margin-top: -216px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter6 {
  from {
    margin-top: -216px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(7):before {
  content: "2754189603";
  margin-top: -120px;
  -webkit-animation-name: letter7;
          animation-name: letter7;
  -webkit-animation-duration: 1.0666666667s;
          animation-duration: 1.0666666667s;
  -webkit-animation-delay: 0.68s;
          animation-delay: 0.68s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter7 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter7 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(8):before {
  content: "8193672450";
  margin-top: -96px;
  -webkit-animation-name: letter8;
          animation-name: letter8;
  -webkit-animation-duration: 1.28s;
          animation-duration: 1.28s;
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter8 {
  from {
    margin-top: -96px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter8 {
  from {
    margin-top: -96px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(9):before {
  content: "8420195637";
  margin-top: -120px;
  -webkit-animation-name: letter9;
          animation-name: letter9;
  -webkit-animation-duration: 2.2333333333s;
          animation-duration: 2.2333333333s;
  -webkit-animation-delay: 0.33s;
          animation-delay: 0.33s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter9 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter9 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(10):before {
  content: "2315048967";
  margin-top: -24px;
  -webkit-animation-name: letter10;
          animation-name: letter10;
  -webkit-animation-duration: 0.14s;
          animation-duration: 0.14s;
  -webkit-animation-delay: 0.93s;
          animation-delay: 0.93s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter10 {
  from {
    margin-top: -24px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter10 {
  from {
    margin-top: -24px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(11):before {
  content: "9058246731";
  margin-top: -168px;
  -webkit-animation-name: letter11;
          animation-name: letter11;
  -webkit-animation-duration: 1.575s;
          animation-duration: 1.575s;
  -webkit-animation-delay: 0.55s;
          animation-delay: 0.55s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter11 {
  from {
    margin-top: -168px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter11 {
  from {
    margin-top: -168px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(12):before {
  content: "6730194582";
  margin-top: -120px;
  -webkit-animation-name: letter12;
          animation-name: letter12;
  -webkit-animation-duration: 2.3333333333s;
          animation-duration: 2.3333333333s;
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter12 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter12 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(13):before {
  content: "2695783104";
  margin-top: -96px;
  -webkit-animation-name: letter13;
          animation-name: letter13;
  -webkit-animation-duration: 1.984s;
          animation-duration: 1.984s;
  -webkit-animation-delay: 0.38s;
          animation-delay: 0.38s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter13 {
  from {
    margin-top: -96px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter13 {
  from {
    margin-top: -96px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(14):before {
  content: "1650948237";
  margin-top: -48px;
  -webkit-animation-name: letter14;
          animation-name: letter14;
  -webkit-animation-duration: 2.6133333333s;
          animation-duration: 2.6133333333s;
  -webkit-animation-delay: 0.02s;
          animation-delay: 0.02s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter14 {
  from {
    margin-top: -48px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter14 {
  from {
    margin-top: -48px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(15):before {
  content: "9270153846";
  margin-top: -48px;
  -webkit-animation-name: letter15;
          animation-name: letter15;
  -webkit-animation-duration: 0.6933333333s;
          animation-duration: 0.6933333333s;
  -webkit-animation-delay: 0.74s;
          animation-delay: 0.74s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter15 {
  from {
    margin-top: -48px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter15 {
  from {
    margin-top: -48px;
  }
  to {
    margin-top: 24px;
  }
}
.letter:nth-child(16):before {
  content: "9870641235";
  margin-top: -120px;
  -webkit-animation-name: letter16;
          animation-name: letter16;
  -webkit-animation-duration: 1.8666666667s;
          animation-duration: 1.8666666667s;
  -webkit-animation-delay: 0.44s;
          animation-delay: 0.44s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
}

@-webkit-keyframes letter16 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}

@keyframes letter16 {
  from {
    margin-top: -120px;
  }
  to {
    margin-top: 24px;
  }
}
  </style>
  </head>

  <body>
<div id="ads" class="blink">Wir arbeiten kontinuierlich an Cryptnote, deshalb kann es vorkommen, dass der Dienst nur eingeschränkt verfügbar ist.</div>
<div class="wrapper">
  <div class="letters"><span class="letter">c</span><span class="letter">r</span><span class="letter">y</span><span class="letter">p</span><span class="letter">t</span><span class="letter">n</span><span class="letter">o</span><span class="letter">t</span><span class="letter">e</span><span class="letter">.</span><span class="letter">c</span><span class="letter">h</span>
  </div>
</div>
<pre id="ascii">
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
  </pre>
  <form id="form" method="post">
  <textarea id="input1" name="input1" cols="100" rows="10" placeholder="Schreibe hier deine Nachricht ..."></textarea>
  <p id="user">Erhalte eine Lesebestätigung über die App <a href="https://telegram.org/">Telegram</a>: <input type="text" id="telegram" name="telegram" placeholder="Dein Benutzername"></p>
  <p><input id="submitbtn" type="submit" value="Verschlüsseln & Link abrufen"></p>
  <input type="hidden" name="_token" id="ctoken" value="<?php echo csrf::token(); ?>">
  </form>
  <div id="result">&nbsp;</div>
  <div id="info">
  <strong>Achtung: Die verschlüsselte Nachricht wird nach 10 Tagen gelöscht oder automatisch zerstört, wenn der Link geöffnet wird! Solltest du den Link verlieren, kann die Nachricht auch nicht mehr gelesen werden.</strong>
  </div>
  <script src="js/crypto-js/crypto-js.js"></script>
  <script src="js/tools.js"></script>
  <script src="js/index.js"></script>
  </body>
</html>