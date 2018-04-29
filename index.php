<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

mb_internal_encoding('UTF-8');

define('ROOT','/php3');

session_start();

use Core\Request;



spl_autoload_register(
	function ($classname){
		include_once __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';
	}
);



if (!$_GET['chpu']){
	$cName = 'Post';
	$acName = 'index';
	$id = null;
}elseif($_GET['chpu'] == 'post/add'){
	$cName = 'Post';
	$acName = 'add';
	$id = null;

}elseif(explode('/', $_GET['chpu'])[0] == 'user'){
	$chanks = explode('/', $_GET['chpu']);
	$cName = 'User';
	$acName = $chanks[1];
	$id = null;
}else{
	$chanks = explode('/', $_GET['chpu']);
	$cName = 'Post';
	$acName = 'one';
	$id = (int)$chanks[1];
}

if ($id) {
	$_GET['id'] = $id;
}


$request = new Request($_GET, $_POST, $_SERVER, $_COOKIE, $_FILES, $_SESSION );

// var_dump($request);
// die();


$controller = sprintf('Controllers\%sController', $cName);
$controller = new $controller($request);

$controller->$acName();
$controller->render();








