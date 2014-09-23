
<?php 

class WebServices {
	private static $url = "https://www.scientipole-croissance.org/scientiweb/webService/";

	private static function callWebService($name, $params) {
		if (!empty($name) && !empty($params)) {
			$jsonObject = "";
			$query = self::$url . $name . "?";
			$i = 1;
			$length = count($params);
			foreach ($params as $paramName => $param) {
				if ($i < $length) {
					$query .= urlencode($paramName) . "=" . urlencode($param) . "&";
				} else {
					$query .= urlencode($paramName) . "=" . urlencode($param);
				}
				++$i;
			}
			$response = file_get_contents($query);
			$jsonObject = json_decode($response);
			if (!$response) {
				return $jsonObject;
			}
		}
		return $jsonObject;
	}

	private static function checkEmail($email) {
		if (!empty($email)) {
			$pattern = "/^[A-Za-z0-9._-]+@[A-Za-z0-9._-]{2,}\.[a-z]{2,4}$/"; 
			if(preg_match($pattern, $email)) {
				return true;
			}
		}
		return false;
	}

	private static function checkType($type) {
		$types = array('new', 'draft', 'online', 'offline', 'deleted', 'aborted', 'refused', 'all');
		foreach ($types as $field) {
			if (strcmp($field, $type) == 0) {
				return true;
			}
		}
		return false;
	}

	private static function checkUser($email, $type = 'offline') {
		if (self::checkEmail($email) && self::checkType($type)) {
			$params = array(
				'email' => $email,
				'type' => $type
				);
			$jsonObject = self::callWebService('searchUser', $params);
			if (!empty($jsonObject) && $jsonObject->code == "200") {
				return $jsonObject;
			}
		}
		return false;
	}

	// public static function test() {
	// 	$params = array(
	// 		'key' => 'izLabY0jyNcDZWBiQfKIHNvSaVGYJX08BcX7abaci8dacSnqRfiRmlVx9WR3UMAD'
	// 		);
	// 	$jsonObject = self::callWebService('getCompany', $params);
	// 	debug($jsonObject); die('debug complete');
	// }

	public static function getInformations($email, $type = 'offline') {
		$informations = array();
		$jsonObject = self::checkUser($email);
		if (!empty($jsonObject) && $jsonObject->code == "200") {
			if (count($jsonObject->responses->companies) == 1) {
				$uid = $jsonObject->responses->companies[0]->uid;
			} else {
					// give choice to user
			}
			$params = array(
				'email' => $email,
				'companyUid' => $uid
				);
			$jsonObject = self::callWebService('getUserKey', $params);
			if (!empty($jsonObject) && $jsonObject->code == "200") {
				$params = array(
					'key' => $jsonObject->responses->key
					);
				$jsonObject = self::callWebService('getCompany', $params);
				if (!empty($jsonObject) && $jsonObject->code == "200") {
					$informations = (array) $jsonObject->responses;
					$informations['address'] = (array) $jsonObject->responses->address;
					$uid = $jsonObject->responses->companyUid;
					foreach ($jsonObject->responses->applicants as $ind => $applicant) {
						$informations['applicants'][$ind] = (array) $applicant;
						$params = array(
							'email' => $applicant->email,
							'companyUid' => $uid
							);
						$jsonObject = self::callWebService('getUserKey', $params);
						if (!empty($jsonObject) && $jsonObject->code == "200") {
							$params = array(
								'key' => $jsonObject->responses->key
								);	
							$jsonObject = self::callWebService('getOseo', $params);
							if (!empty($jsonObject) && $jsonObject->code == "200") {
								$informations['applicants'][$ind]['address'] = (array) $applicant->address;
								$informations['applicants'][$ind]['oseo'] = $jsonObject->responses->garantie;
							}
						}
					}
				}
			}
		}
		return $informations;
	}
}

?>