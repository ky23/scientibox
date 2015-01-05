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
				$path = $this->getUploadPath($model, $path, $extension);
				if (!file_exists(WWW_ROOT . $path)) {
					mkdir(WWW_ROOT . $path, 0755, true);
				}
				chmod(WWW_ROOT . $path, 0644);
				move_uploaded_file($file['tmp_name'], WWW_ROOT . $path
					. $model->data[$model->alias][$field . "_file"]['name']);
				//$model->data[$model->alias][$field . '_file']['path'] = '/app/webroot/' . $path;
				$this->saveFileData($model->alias, $field, $file, $extension, $path,
					$model->data[$model->alias]['upload_owner']);
			}
		}
		$model->getEventManager()->dispatch(new CakeEvent($name, $model));
	}

	private function saveFileData($category, $type, $file, $extension, $path, $applicant_id) {
		if (!empty($file['name']) && !empty($file['size'])) {
			$fileModel = new File();
			$data = array();
			$data['category'] = $category;
			$data['type'] = $type;
			$data['name'] = $file['name'];
			$data['extension'] = $extension;
			$data['path'] = WWW_ROOT . $path;
			$data['size'] = $file['size'];
			$data['uploaded_date'] = date("Y-m-d H:i:s");
			$data['applicant_id'] = $applicant_id;
			$fileModel->save($data);
		}
	}

	private function getUploadPath(Model $model, $path, $extension) {
		$path = trim($path, "/");
		if ($model->alias == 'Company') {
			$replace = array(
				'%company' => strtolower($model->data[$model->alias]['name'] . "_" . $model->id . DS)
				);
		} else if ($model->alias == 'Profile') {
			$replace = array(
				'%company' => strtolower($model->data[$model->alias]['company_name'] . "_" .
					$model->data[$model->alias]['company_id'] . DS),
				'%applicant' => strtolower($model->data[$model->alias]['ParentDir'] . DS
					. $model->data[$model->alias]['first_name'] . "_"
					. $model->data[$model->alias]['last_name'] . "_" . $model->id . DS)
				);
		}
		$path = strtr($path, $replace);
		return $path;
	}
}

?>