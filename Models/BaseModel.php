<?php

namespace Models;

use Core\Validator;
use Core\Exceptions\ValidateException;

abstract class BaseModel
{
	protected $db;
	protected $table;
	protected $validator;
	
	public function __construct(\PDO $db, Validator $validator)
	{
		$this->db = $db;
		$this->validator = $validator;
	}
	
	public function getAll()
	{
		$sql = "SELECT * FROM {$this->table}";
		$stmt = $this->db->query($sql);

		return $stmt->fetchAll();
    }
    
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
		$stmt->execute([
			'id' => $id
		]);

		return $stmt->fetch();
	}
	
	public function insert(array $params){

		$this->validator->execute($params);
		if(!$this->validator->success){
			// error
			throw new ValidateException($this->validator->errors);
			
		}


		$columns = sprintf('(%s)', implode(', ', array_keys($params)));
		$masks = sprintf('(:%s)', implode(', :', array_keys($params)));

		$sql = sprintf('INSERT INTO %s %s VALUES %s', $this->table, $columns, $masks);

		$stmt = $this->db->prepare($sql);
		$stmt->execute($params);

		return $this->db->lastInsertId();
	}
}
