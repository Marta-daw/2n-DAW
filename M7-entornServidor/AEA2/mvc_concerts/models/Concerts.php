<?php

// magic constant
require_once (__DIR__ . "/../core/DBAbstractModel.php");

class concerts extends DBAbstractModel{

    private $id;
    private $nomBanda;
    private $ciutat;
    private $sala;
    private $data;
    private $hora;

    function __construct() {
        $this->db_name = "concertsMVC";
    }

    function __toString () {
        echo "entro string <br>";
        return "(".$this->id.", ". $this->nomBanda.", ".$this->ciutat.", ".$this->sala.", ".$this->data.", ".$this->hora .")";
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
            } else {
                $this->query .= ", " . $fields[$i];
            }
        }
        $this->query .= " FROM concerts";
        $this->get_results_from_query();
        return $this->rows;
        
    }

    //Select per nom de la banda a buscar
    public function select($nomBanda="") {
        $this->query="SELECT grup, ciutat, sala, data, hora FROM concerts WHERE grup='$nomBanda'";
        $this->get_results_from_query();
        return $this->rows;
    }

    //Select per rang de dates
    public function selectByDateRange($startDate="", $endDate=""){
        $this->query="SELECT grup, ciutat, sala, data, hora FROM concerts WHERE data BETWEEN '$startDate' AND '$endDate' ";
        $this->get_results_from_query();
        return $this->rows;
    }


    public function insert($user_data = array()) {
        $this->query="INSERT INTO concerts (grup, ciutat, sala, data, hora) VALUES
            ('" . $user_data['grup'] . "',
            '" . $user_data['ciutat'] . "',
            '" . $user_data['sala'] . "',
            '" . $user_data['data'] . "',
            '" . $user_data['hora'] . "')";
        $this->execute_single_query();
        return $this->rows;
    }

    public function update ($userData = array()) {
        $this->query="UPDATE concerts SET
            grup = '".$userData['grup']."',
            ciutat = '".$userData['ciutat']."',
            sala= '".$userData['sala']."'
            WHERE grup='".$userData['grup']."'";
        $this->execute_single_query();
        return $this->rows;
    }

    public function delete ($nomBanda = ""){
        $this->query="DELETE FROM concerts WHERE grup='$nomBanda'";
        $this->execute_single_query();
    }
}



