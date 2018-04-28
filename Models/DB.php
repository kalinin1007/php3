<?php

namespace Models;

class DB
{
	protected static $instance;

	public static function getConnect(){
		if (!self::$instance){
			self::$instance = self::connect();
		}
		return self::$instance;
	}


	protected static function connect()
	{
		$pdo = new \PDO('mysql:host=localhost;dbname=test', 'root', '237339');
		$pdo->exec('SET NAMES UTF8');
		return $pdo;
	}
}
