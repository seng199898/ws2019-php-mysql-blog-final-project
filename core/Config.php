<?php

class Config{

	protected static $config;

	public static function init( $config ) {
		self::$config = $config;
	}

	public static function database() {
		return self::$config['database'];
	}

	public static function files() {
		return self::$config['files'];
	}
}