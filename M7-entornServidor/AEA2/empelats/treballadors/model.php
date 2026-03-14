<?php

// magic constant
require_once (__DIR__ . "/../core/DBAbstractModel.php");

class persones extends DBAbstractModel {
  
  private $id;
  private $nom;
  private $edat;
  private $alcada;

  public $message;
  
  function __construct() {
    $this->db_name = "empleatsmvc";
  }
  
  function __toString() {
    echo "entro string <br>";
    return "(" . $this->id . ", " . $this->name . ", " . $this->edat . ", " .  
      $this->alcada . ")";
  }
  
  function __destruct() {}
  
  //select dels camps passats de tots els registres
  //stored in $rows property
  public function selectAll($fields=array()) {
    
    $this->query="SELECT ";
    $firstField = true;
    for ($i=0; $i<count($fields); $i++) {
      if ($firstField) {
        $this->query .= $fields[$i];
        $firstField=false;
      }
      else $this->query .= ", " . $fields[$i];
    }
    $this->query .= " FROM empleat";
    $this->get_results_from_query();
    return $this->rows;
    
  }
  
  public function select($nom="") {
      //Crear la query aqui per a consultar el nom que em entrat pel formulari 
      // i passar-les despré a la vista per a mostrar les dades

      //EL cridem al controller 
      $this->query="SELECT nom, cognoms, profession, telefon FROM empleat WHERE nom= '$nom'";
      $this->get_results_from_query();
      return $this->rows;
  }
  
  
  public function insert($user_data = array()) {
    //TODO queries

    $this->query="INSERT INTO empleat (nom, cognoms, profession, telefon) VALUES
        ('" . $user_data['nom'] . "',
        '" . $user_data['cognoms'] . "',
        '" . $user_data['profession'] . "',
        '" . $user_data['telefon'] . "')";
    $this->execute_single_query();
  }
  
  public function update ($userData = array()) {
      $this->query="UPDATE empleat SET
        nom= '".$userData['nom']."',
        cognoms= '".$userData['cognoms']."',
        profession= '".$userData['profession']."',
        telefon='".$userData['telefon']."'
        WHERE nom='".$userData['nom']."'";
      $this->execute_single_query();
  }

  public function delete ($nom="") {
    $this->query = "DELETE FROM empleat WHERE nom='$nom'";
    $this-> execute_single_query();
  }
    
}

?>
