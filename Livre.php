<?php



class Livre
{


    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }


    function insertLivreRecord($livcode, $livnomaut, $livprenomaut, $livtitre, $livcategorie, $livISBN, $livdejareserve)
    {
        $query = "INSERT INTO livres (livcode, livnomaut, livprenomaut, livtitre, livcategorie, livISBN, livdejareserve) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssssssi";

        // $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $livcode = substr(str_shuffle($permitted_chars), 0, 16);

        $paramArray = array(
            $livcode,
            $livnomaut,
            $livprenomaut,
            $livtitre,
            $livcategorie,
            $livISBN,
            $livdejareserve
        );

        $insertId = $this->ds->insert($query, $paramType, $paramArray);
        return $insertId;
    }
    function getLivreByCode($livreCode)
    {
        $query = "select * FROM livres WHERE livcode = ?";
        $paramType = "s";
        $paramArray = array($livreCode);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);

        return $memberResult;
    }
    function reserve($livreCode)
    {
        $query = "UPDATE livres SET livdejareserve = 1 WHERE livcode = ?";
        $paramType = "s";
        $paramArray = array($livreCode);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
    }
    function getLivres()
    {
        $query = "select * FROM livres";
        $paramType = "";
        $paramArray = "";
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        return $memberResult;
    }
}
