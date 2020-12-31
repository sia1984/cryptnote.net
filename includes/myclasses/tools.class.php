<?php

class tools {
	public static function blank($String){
		if(!isset($String)) return true;

		$Replace = array(' ','&nbsp;');
		$String = trim($String);
		$String = str_replace($Replace,'',$String);

		return empty($String);
	}

	public static function url(){  
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
	    	$link = "https"; 
		else {
			$link = "http"; 
		}
		$link .= "://"; 
		$link .= $_SERVER['HTTP_HOST']; 
		return $link;
	}

}