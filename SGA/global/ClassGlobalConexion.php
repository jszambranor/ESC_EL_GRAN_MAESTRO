<?php

class Conexion
{
    public function __construct()
    {

    }
    /*prueba*/

    private $host = "localhost";
    private $bd = "maestro_db";
    private $user = "maestro_jacuestaf";
    private $pass = "#passwordJa2020";

    public function get_Conexion()
    {
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->bd", $this->user, $this->pass);
        } catch (PDOExeption $e) {
            echo "¡Error!"." ".$e->getMessage()."<br>";
            $con = null;
            die();
        }
        try {
            if (!isset($con)) {
                echo "¡Error!"." ".$e->getMessage()."<br>";
                $con = null;
                die();
            } else {
                return $con;
            }
        } catch (PDOExeption $e) {
            echo "¡Error!"." ".$e->getMessage()."<br>";
            $con = null;
            die();
        }
    }
}
