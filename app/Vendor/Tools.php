<?php 
class Tools {

	public static function unsetFromArray(&$array = array(), $keys = array()) {
		foreach ($keys as $key) {
			unset($array[$key]);
		}
	}

}


?>