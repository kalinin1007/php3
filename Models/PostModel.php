<?php

namespace Models;

use Core\Validator;

class PostModel extends BaseModel
{

	protected $table = 'posts';
	protected $schema = [
		'id'=>[
		],
		'title'=>[
			'min'=>5
		],
		'slug'=>[
			'require'=>true
		]
	];
	
	public function __construct(\PDO $db, Validator $validator)
	{
		parent::__construct($db, $validator);
		$this->validator->setRules($this->schema);
	}
}
