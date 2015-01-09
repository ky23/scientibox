<?php 
class Tools {

	public static function unsetFromArray(&$array = array(), $keys = array()) {
		foreach ($keys as $key) {
			unset($array[$key]);
		}
	}

	public static function formatDate($format, $date) {
		if (!empty($date)) {
			return date($format, strtotime($date));
		}
		return date($format);
	}

}


?>