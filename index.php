<?php
// For Vuejs ajax from different port and domain
// header("Access-Control-Allow-Origin: *");

include_once('./config.php');

foreach(Config::files() as $file){
	include_once($file);
}

Router::resolve();