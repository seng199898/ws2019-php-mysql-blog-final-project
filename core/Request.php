<?php

class Request{
	public function input($name, $default = false){
		return $_REQUEST[$name] ?? $default;
	}

	public function has($query) {
		if (is_array($query)) {
			$fine = true;
			foreach ($query as $q) {
				if (!isset($_REQUEST[$q])) {
					$fine = false;
				}
			}
			return $fine;
		} else {
			if (isset($_REQUEST[$query])) {
				return true;
			}
		}

		return false;
	}
}