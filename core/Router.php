<?php

class Router {
	static $routes = [
		'GET' => [],
		'POST' => [],
	];

	static $notFound = [];

	public static function get($uri, $controller) {
		self::$routes['GET'][$uri] = $controller;
	}

	public static function post($uri, $controller) {
		self::$routes['POST'][$uri] = $controller;
	}

	public static function notFound( $controller ) {
		self::$notFound[0] = $controller;
	}

	public static function resolve() {
		$uri = $_SERVER['REQUEST_URI'];

		$uri = strtok($uri, '?');

		if (strlen($uri) > 1) {
			$uri = rtrim($uri, '/');
		}

		if (isset(self::$routes[$_SERVER['REQUEST_METHOD']][$uri])) {
			$controller = self::$routes[$_SERVER['REQUEST_METHOD']][$uri];
			if (is_callable($controller)) {
				return self::callAction($controller);
			} else {
				return self::callAction(
					...explode('@', $controller)
				);
			}
		}

		if (self::$notFound[0]) {
			if (is_callable(self::$notFound[0])) {
				self::$notFound[0]();
			} else {
				return self::callAction(
					...explode('@', self::$notFound[0])
				);
			}
		} else {
			throw new \Exception('404 Not Found');
		}
	}

	protected static function callAction($controller, $method = false) {
		if (is_callable($controller)) {
			$controller();
		} else {
			if (!method_exists($controller, $method)) {
				throw new \Exception(
					"{$controller} does not respond to method {$method}"
				);
			}

			return (new $controller)->$method();
		}
	}
}