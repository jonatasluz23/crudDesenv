<?php

namespace Source\Core;
use \PDO;

class Model {

    protected $db;

    public function __construct() {
        if(is_null($this->db)){
            try{
                $this->db = new PDO('mysql:host='.HOST.';dbname='.DATABASE,DBUSER,DBPASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(\Exception $e){
                die("Erro de Conexão com o banco de Dados! $e");
            }
        }

        return $this->db;
    }   
}
