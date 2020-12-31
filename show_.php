<?php
include_once("includes/autoload_own_classes.php");
include_once("includes/crypto.phar");
use Defuse\Crypto\Key;
use Defuse\Crypto\Crypto;

$id = preg_replace('/[^a-zA-Z0-9]/', '', $_POST["id"]);
$key = preg_replace('/[^a-zA-Z0-9]/', '', $_POST["key"]);

$filename = glob("data/*?" . $id . "?container");
$arr = explode("?", $filename[0]);
$telegram = substr($arr[0], 5);
$fileid = $arr[1];

if(is_readable($filename[0])){
	$encrypted = file_get_contents($filename[0]);
	try {
		$decrypted = Crypto::decryptWithPassword($encrypted, $key);
	} catch(Exception $e) {
		echo "Die Nachricht konnte nicht entschlüsselt werden.";
	}
	echo "<div style=\"font-family: Consolas, monaco, monospace;\"><pre id=\"encoded\">" . $decrypted . "</pre></div>";
	unlink($filename[0]);
	telegram::send_telegram_message($telegram, $fileid);
	echo "<p style=\"font-family: Consolas, monaco, monospace;\"><strong>Diese verschlüsselte Nachricht wurde automatisch zerstört und kann nicht erneut mit diesem Link aufgerufen werden!<strong></p>";
} else {
	echo "<strong style=\"font-family: Consolas, monaco, monospace;\">Nachricht existiert nicht mehr oder wurde von einer anderen Person bereits geöffnet.</strong>";
}
?>