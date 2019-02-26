<?php

class Connection {
	public static function make($db_config) {
		try {
			return new PDO(
				$db_config['driver'] . ':' .
				'host=' . $db_config['host'] . ';' .
				'dbname=' . $db_config['database'] . ';' .
				'charset=' . $db_config['charset'],
				$db_config['username'],
				$db_config['password']
			);
		} catch (Exception $e) {
			die( $e->getMessage() );
		}
	}
}