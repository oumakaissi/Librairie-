<?php


class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once("DataSource.php");
        $this->ds = new DataSource();
    }

    function validateMember()
    {
        $valid = true;
        $errorMessage = array();
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }

        if ($valid == true) {
            
            if (!isset($error_message)) {
                if (!isset($_POST["terms"])) {
                    $errorMessage[] = "Accept terms and conditions.";
                    $valid = false;
                }
            }
        } else {
            $errorMessage[] = "All fields are required.";
        }

        if ($valid == false) {
            return $errorMessage;
        }
        return;
    }

    function isMemberExists($lecnom)
    {
        $query = "select * FROM lecteurs WHERE lecnom = ?";
        $paramType = "s";
        $paramArray = array($lecnom);
        $memberCount = $this->ds->numRows($query, $paramType, $paramArray);

        return $memberCount;
    }

    function insertMemberRecord($lecnum, $lecnom, $lecprenom, $lecadresse, $lecville, $leccodepostal, $lecmotdepasse)
    {
        $passwordHash = md5($lecmotdepasse);
        $query = "INSERT INTO lecteurs (lecnum, lecnom, lecprenom, lecadresse, lecville, leccodepostal, lecmotdepasse) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $paramType = "sssssss";
        
        // $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $lecnum = substr(str_shuffle($permitted_chars), 0, 16);

        $paramArray = array(
            $lecnum,
            $lecnom,
            $lecprenom,
            $lecadresse,
            $lecville,
            $leccodepostal,
            $lecmotdepasse
        );
        $insertId = $this->ds->insert($query, $paramType, $paramArray);
        return $insertId;
    }

    function getMemberById($memberId)
    {
        $query = "select * FROM lecteurs WHERE lecnum = ?";
        $paramType = "s";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);

        return $memberResult;
    }

    function processLogin($lecnom, $password)
    {
        $passwordHash = $password;
        $query = "select * FROM lecteurs WHERE lecnom = ? AND lecmotdepasse = ?";
        $paramType = "ss";
        $paramArray = array($lecnom, $passwordHash);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if (!empty($memberResult)) {
            $_SESSION["lecnum"] = $memberResult[0]["lecnum"];
            // $_SESSION["role"] = $memberResult[0]["role"];
            return true;
        }
    }

    function getMemberRole($memberId)
    {
        $role = "";
        $member = $this->getMemberById($memberId);
        $role = $member->$role;
        return $role;
    }
}
