<?php
include_once('./core/Config.php');

date_default_timezone_set("Asia/Macao");

Config::init([

	'files' => [
		'./base/functions.php',

		'./core/database/Connection.php',
		'./core/database/QueryBuilder.php',
		'./core/database/DB.php',
		'./core/Router.php',
		'./core/Request.php',

		'./controller/PostController.php',
		'./controller/CategoryController.php',
		'./view/View.php',
		'./Router/api.php',
	],

	'database' => [
		'driver'  => 'mysql',
		'host' => 'localhost',
		'database' => 'worldskill_final_project',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8mb4',
	],

]);