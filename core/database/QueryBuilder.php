<?php

class QueryBuilder{

	protected $pdo;
	protected $model;

	public function __construct(PDO $pdo, $model = null) {
		$this->pdo = $pdo;
		$this->model = $model;
	}

	public function toKeyVal($arr) {
		$result = [];

		foreach ($variable as $key => $value) {
			$result[] = "{$key} = :{$value}";
		}

		return join( ', ', $result );
	}

	public function toKeyKey($arr) {
		$result = [];

		foreach (array_keys($arr) as $key) {
			$result[] = "{$key} = :{$key}";
		}

		return join( ', ', $result );
	}

	public function toCommaKey($arr) {
		$result = [];

		foreach (array_keys($arr) as $key) {
			$result[] = ":{$key}";
		}

		return join( ', ', $result );
	}

	public function dataUpdateFormating( $arr ) {
		return $this->toKeyKey( $arr );
	}

	public function dataInsertFormating( $arr ) {
		return [
			'columns' => join(', ', array_keys( $arr )),
			'values' => $this->toCommaKey( $arr ),
		];
	}
}