<?php

define("MS_DEBUG", true);

class Debug {
	
	public static $result;

	public static function add($var)
	{
		$trace = debug_backtrace();  
	    $vLine = file($trace[0]['file']);  
	    $fLine = $vLine[ $trace[0]['line'] - 1 ];  
	    preg_match( "#\((\\$?[a-zA-Z_\-\>\:\(\)\[\]\']+)\);#", $fLine, $match );
		self::$result[$match[1]] = $var;
	}

	public static function out($local = false)
	{
		if(MS_DEBUG && $local)
		{
			if(count(self::$result))
			{
				echo "<pre style='padding: 10px; background: #ccc; width: 90%; position: relative; margin: 10px auto; display: block; border: 1px solid gray; border-radius: 9px; display: block;font-size:11px; line-height: 12px'>";
				foreach (self::$result as $key=>$value) {
					echo "<b>".$key."</b>".":\r\n";
					print_r($value);
					echo "\r\n<hr style='margin: 3px 0 0; border-color: #777'>\r\n";
				}
				echo "</pre>";	
			}	
		}
	}

	public static function getVarName($var) {  
	    $trace = debug_backtrace();  
	    var_dump($trace);die;
	    $vLine = file( __FILE__ );  
	    $fLine = $vLine[ $trace[0]['line'] - 1 ];  
	    preg_match( "#\\$(\w+)#", $fLine, $match );  
	    return $match[1];  
	}  
}