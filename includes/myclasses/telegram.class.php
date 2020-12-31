<?php

class telegram {

private static $key = "<BOT API KEY>";

public static function searchID($username){
	foreach(file("includes/tdb") as $line) {
   		$arr = explode(";", $line);
   		if($username == $arr[0]){
   			return trim($arr[1]);
   		}
	}
	return false;
}

public static function search($username){
	$array = array();
	foreach(file("includes/tdb") as $line) {
   		$arr = explode(";", $line);
   		if($arr[0] == $username){
   			$bool = true;
   		} else {
   			$bool = false;
   		}
   		if($bool){
   			return true;
   		}
	}
	return false;
}

public static function addUser($username, $teleid){
	if($self::search($username)){

	} else {
		file_put_contents("includes/tdb", $username . ";" . $teleid . "\n", FILE_APPEND);
		$key = self::$key;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $key . "/sendMessage?chat_id=" . $teleid . "&text=Du wurdest erfolgreich registriert.");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
	}
}

public static function getUpdatesFromBot(){
	$key = self::$key;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $key . "/getUpdates");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);  

	$obj = json_decode($output, true);
	$objres = $obj["result"];

	for($i = 0; $i < count($objres); $i++){
	    $self::addUser($objres[$i]["message"]["from"]["username"], $objres[$i]["message"]["from"]["id"]);
	}
}

public static function send_telegram_message($telegram, $fileid){
	$key = self::$key;
	$telegramid = self::searchID($telegram);
	if($telegramid == false){
		return;
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $key . "/sendMessage?chat_id=" . $telegramid . "&text=Deine Nachricht mit der ID " . $fileid . " wurde gelesen.");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
}

}