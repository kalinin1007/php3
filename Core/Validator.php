<?php

namespace Core;

class Validator
{
	public $clean = [];
	public $errors = [];
	public $success = false;
	protected $rules;

	public function execute(array $params)
	{
		$params = $this->cleanParams($params);

		foreach ($this->rules as $name => $rules) {
			//проверяем наличие required в правилах  и заполненость поля 
			if (isset($rules['require']) && !$params[$name]) {
				$this->errors[$name][] = sprintf('Field %s is require!', $name);
			}
			//проверяем наличие min в правилах и соответствие длины  
			if (isset($rules['min']) && mb_strlen($params[$name]) < $rules['min']) {
				$this->errors[$name][] = sprintf('Field %s too small, min %d letters!', $name, $rules['min']);
			}
		}

		if(!$this->errors){
			$this->success = true;
		}
	}

	public function setRules(array $rules)
	{
		$this->rules = $rules;
	}

	protected function cleanParams($params)
	{
		foreach($params as $key => $value){
			$params[$key] = trim(htmlspecialchars($value));
		}
		return $params;
	}
}