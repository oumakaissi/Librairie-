<?php



class Reserver
{


    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function getReserverByLecteur($empnumlect)
    {
        $query = "select * FROM emprunts WHERE empnumlect = ?";
        $paramType = "s";
        $paramArray = array($empnumlect);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);

        return $memberResult;
    }
    function getReserverByCode($empcodelivre)
    {
        $query = "select * FROM emprunts WHERE empnum = ?";
        $paramType = "s";
        $paramArray = array($empcodelivre);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);

        return $memberResult;
    }

    function getReservers()
    {
        $query = "select * FROM emprunts ";
        $paramType = "";
        $paramArray = "";
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        return $memberResult;
    }

    function reserver($empnum,$empcodelivre, $empnumlect)
    {
        $query = "INSERT INTO emprunts (empnum, empdate, empdateret, empcodelivre, empnumlect) VALUES (?, ?, ?, ?, ?)";
        $paramType = "sssss";

        $empdate1 = date("Y-m-d");
        $empdate = '' . date("Y-m-d");
        $empdateret = '' . date('Y-m-d', strtotime($empdate1 . ' +1 day'));

        
        $paramArray = array($empnum, $empdate, $empdateret, $empcodelivre, $empnumlect);
        $insertId = $this->ds->insert($query, $paramType, $paramArray);

        return $insertId;
    }
}
