<?php


require_once(__DIR__."/../core/DBAbstractModel.php");

class products extends DBAbstractModel {

	private $id;
	private $nom;
	private $categoria;
	private $preu;
	private $color;

	public $message;

	function __construct() {
		$this->db_name = "botiga";
	}

	function __toString() {
		echo "entro string <br>";
		return "(" . $this->id . ", " . $this->nom . ", " . $this->categoria . ", " . $this->preu . ", " . $this->color . ")";
			$this->alcada . ")";
	}

	function __destruct() {
	}


	public function selectAll($fields = array()) {
		$this->query = "SELECT ";
		$firstField = true;
		for ($i = 0; $i < count($fields); $i++) {
			if ($firstField) {
				$this->query .= $fields[$i];
				$firstField = false;
			} else $this->query .= ", " . $fields[$i];
		}
		$this->query .= " FROM products";
		$this->get_results_from_query();
		return $this->rows;
	}

	public function select($nom = "") {

		$this->query = "SELECT nom, edat, alcada FROM persones WHERE nom = '$nom'";
		$this->get_results_from_query();
		return $this->rows;
	}

	public function insert($nom="",$categoria="",$preu="",$color="") {

		$this->query = "INSERT INTO products (nom, categoria, preu, color) VALUES ('$nom', '$categoria', '$preu', '$color');";
		$this->execute_single_query($this->query);
	}



}
