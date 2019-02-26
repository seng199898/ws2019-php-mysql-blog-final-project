<?php

class DB extends QueryBuilder {
	private $table = false;
	private $sql = '';
	private $executeData = false;

	private function __construct($db_config) {
		parent::__construct( Connection::make( $db_config ) );
	}

	public static function table($table) {
		$db = new DB( Config::database() );
		$db->table = $table;
		return $db;
	}

	public function select($select = null) {
		if( is_array($select) ) {
			$columns = join(', ', $select);
			$this->sql = "SELECT {$columns} FROM {$this->table} ";
		} elseif ($select == null) {
			$this->sql = "SELECT * FROM {$this->table} ";
		} else {
			$this->sql = "SELECT {$select} FROM {$this->table} ";
		}

		return $this;
	}

	public function insert($insertData) {
		$format = $this->dataInsertFormating($insertData);
		$this->sql = "INSERT INTO {$this->table} ( {$format['columns']} ) VALUES ( {$format['values']} )";

		$stmt = $this->pdo->prepare( $this->sql );
		$stmt->execute($insertData);
		return $stmt;
	}

	public function update($updateData) {
		$format = $this->dataUpdateFormating($updateData);
		$this->sql = "UPDATE {$this->table} SET {$format} " . $this->sql;

		$stmt = $this->pdo->prepare( $this->sql );
		$stmt->execute($updateData);
		return $stmt;
	}

	public function delete() {
		$this->sql = "DELETE FROM {$this->table} " . $this->sql;

		$stmt = $this->pdo->prepare( $this->sql );
		$stmt->execute();
		return $stmt;
	}

	public function where($key, $val = null, $thirdParam = null) {
		if (is_callable( $key )) {
			$this->sql .= " WHERE (";
			$key( $this );
			$this->sql .= " ) ";
			$this->sql = str_replace('( AND', '(', $this->sql);
		} else {
			if (strpos( $this->sql, "WHERE" ) != false) {
				if ($thirdParam == null)
					$this->sql .= " AND {$key} = '{$val}' ";
				else
					$this->sql .= " AND {$key} {$val} '{$thirdParam}' ";
			} else {
				if ($thirdParam == null)
					$this->sql .= "WHERE {$key} = '{$val}' ";
				else
					$this->sql .= "WHERE {$key} {$val} '{$thirdParam}' ";
			}
		}

		return $this;
	}

	public function orWhere($key, $val = null, $thirdParam = null) {
		if ($thirdParam == null)
			$this->sql .= " OR {$key} = '{$val}' ";
		else
			$this->sql .= " OR {$key} {$val} '{$thirdParam}' ";

		return $this;
	}

	public function orderBy($column, $desc = null) {
		if ($desc == null)
			$this->sql .= "order by {$column} ";
		else
			$this->sql .= "order by {$column} {$desc} ";
		return $this;
	}

	public function get() {
		// var_dump($this->sql);
		$stmt = $this->pdo->prepare( $this->sql );
		if ($this->executeData) {
			$stmt->execute($this->executeData);
		} else {
			$stmt->execute();
		}
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function first() {
		$this->sql .= "LIMIT 1 ";

		$record = $this->get();
		return ($record && count($record) > 0)? $record[0] : false;
	}

	public function find($id, $val = null) {
		if ($val == null) {
			$stmt = $this->pdo->prepare( "SELECT * FROM {$this->table} WHERE id = {$id}" );
		} else {
			$stmt = $this->pdo->prepare( "SELECT * FROM {$this->table} WHERE {$id} = {$val}" );
		}
		
		$stmt->execute();
		$stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
		return ($stmt && count($stmt) > 0)? $stmt[0] : false;
	}
}