<?php

App::import('File','Model');

class UploadBehavior extends ModelBehavior {
	private $options = array();
	private $defaultOptions = array(
		'fields' => array()
		);

	public function setup(Model $model, $config = array()) {
		$this->options[$model->alias] = array_merge($this->defaultOptions, $config);
	}

	public function fileExtension(Model $model, $check, $extensions, $allowEmpty = ture) {
		$file = current($check);
		if ($allowEmpty && empty($file['tmp_name'])) { 
			return true;
		}
		$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
		return in_array($extension, $extensions);
	}

	public function beforeSave(Model $model, $options = array()) {
		//debug($model->data[$model->alias]); die();
		$name = 'Model.' . $model->alias . '.edit';
		foreach ($this->options[$model->alias]['fields'] as $field => $path) {
			if (isset($model->data[$model->alias][$field . "_file"])) {
				$file = $model->data[$model->alias][$field . "_file"];
				$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
				//debug($extension); die();
				$path = $this->getUploadPath($model, $path);
				if (!file_exists(WWW_ROOT . $path)) {
					mkdir(WWW_ROOT . $path, 0755, true);
				}
				chmod(WWW_ROOT . $path, 0644);
				move_uploaded_file($file['tmp_name'], WWW_ROOT . $path
					. $model->data[$model->alias][$field . "_file"]['name']);
				//$model->data[$model->alias][$field . '_file']['path'] = '/app/webroot/' . $path;
				$this->saveFileData($model->alias, $field, $extension, $path, $model->data[$model->alias]);
			}
		}
		$model->getEventManager()->dispatch(new CakeEvent($name, $model));
	}

	private function saveFileData($category, $field, $extension, $path, $modelData) {
		if (!empty($modelData[$field . "_file"]['name']) && !empty($modelData[$field . "_file"]['size'])) {
			$fileModel = new File();
			$data = array();
			$data['category'] = $category;
			$data['type'] = $field;
			$data['name'] = $modelData[$field . "_file"]['name'];
			$data['extension'] = $extension;
			$data['path'] = 'app/webroot/' . $path;
			$data['size'] = $modelData[$field . "_file"]['size'];
			$data['date'] = date("Y-m-d H:i:s");
			$data['applicant_id'] = $modelData['upload_owner'];
			$data['company_id'] = $modelData['company_id'];
			$data['concerned_id'] = $modelData['id'];
			$fileModel->save($data);
		}
	}

	private function getUploadPath(Model $model, $path) {
		$path = trim($path, "/");
		if ($model->alias == 'Company') {
			$replace = array(
				'%company' => strtolower($model->data[$model->alias]['name'] . "_" . $model->id . DS)
				);
		} else if ($model->alias == 'Profile') {
			$replace = array(
				'%company' => strtolower($model->data[$model->alias]['company_name'] . "_" .
					$model->data[$model->alias]['company_id']),
				'%applicant' => strtolower($model->data[$model->alias]['first_name'] . "_"
					. $model->data[$model->alias]['last_name'] . "_" . $model->id . DS)
				);
		}
		$path = strtr($path, $replace);
		return $path;
	}
}

?>