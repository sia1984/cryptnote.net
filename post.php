<?php
session_start();

include_once("includes/vendor/autoload.php");
include_once("includes/crypto.phar");
include_once("includes/autoload_own_classes.php");

use Defuse\Crypto\Key;
use Defuse\Crypto\Crypto;
use csrfhandler\csrf as csrf;

$isValid = csrf::post();

if($_SESSION["timestamp"] + 60 * 10 <= time()){
		unset($_SESSION["timestamp"]);
		unset($_SESSION["counter"]);
}

if($isValid){

	$array = array("'", '"');
	$data = strip_tags($_POST["input1"], "<br>");
	$data = str_replace($array, "", $data);
	$data = stripslashes($data);
	$data = filter_var($data, FILTER_SANITIZE_STRING);
	$telegram = strip_tags($_POST["telegram"]);
	$telegram = str_replace($array, "", $telegram);
	$telegram = stripslashes($telegram);
	$telegram = filter_var($telegram, FILTER_SANITIZE_STRING);
	$telegram = str_replace("?", "", $telegram);

	if(!tools::blank($data) && strlen($data) < 5000 && strlen($telegram) < 30){
		if(!isset($_SESSION["timestamp"]) && !isset($_SESSION["counter"])){
		  $_SESSION["timestamp"] = time();
		  $_SESSION["counter"] = 0;
		}
		if($_SESSION["timestamp"] + 60 * 10 > time() && $_SESSION["counter"] < 10){
			$factory = new RandomLib\Factory;
			$generator = $factory->getMediumStrengthGenerator();
			$lowGenerator = $factory->getLowStrengthGenerator();

			$randstr = $lowGenerator->generateString(10, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
			
			$password = $generator->generateString(32, "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
			$encrypted = Crypto::encryptWithPassword($data, $password);
			file_put_contents("data/" . $telegram . "?" . $randstr . "?container", $encrypted);
			echo "<span id=\"showurl\">" . tools::url() . "/show?id=" . $randstr . "&key=" . $password . "</span>";
			$_SESSION["counter"]++;
			$telegramid = telegram::getUpdatesFromBot();
		} else {
			echo "Bitte warte 10 Minuten.";
		}
	} else {
		echo "Fehler!";
	}

} else {
	echo "fuck off!";
}

csrf::flushToken();