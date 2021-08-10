<?php

namespace Source\Model;

use Source\Core\Model;

Class Desenv extends Model {

    private $id;
    private $nome;
    private $nascimento;
    private $sexo;
    private $hobby;
    private $idade;


    public function __construct() {
        parent::__construct();
    }

    public function list($id = "") {
        $sql = "SELECT ID, Nome, DATE_FORMAT(DataNascimento,'%d/%m/%Y') AS Nascimento, 
                IF(Sexo = 'M', 'Masculino', 'Feminino') AS Sexo, Hobby, Idade FROM desenv ";
        $sql .= !empty($id) ? "WHERE ID = '$id' " : "" ;
        $sql .= " ORDER BY ID";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    } 

   public function save($dados){
        
        if(empty($dados['id'])){
            $sql = "INSERT INTO desenv (Nome, DataNascimento, Sexo, Idade, Hobby) VALUES 
            ('{$dados['nome']}', '{$dados['nascimento']}', '{$dados['sexo']}', '{$dados['idade']}', '{$dados['hobby']}')";
        }else{
            
            $sql = "UPDATE desenv SET 
                        Nome = '{$dados['nome']}',
                        DataNascimento = '{$dados['nascimento']}',
                        Sexo = '{$dados['sexo']}',
                        Idade = '{$dados['idade']}',
                        Hobby = '{$dados['hobby']}'
                    WHERE
                        ID = '{$dados['id']}' LIMIT 1";
        }
        $query = $this->db->prepare($sql);
        return $query->execute() ? true : false;
    }

    public function delete($id){
        $sql = "DELETE FROM desenv WHERE ID = '$id' LIMIT 1";
        $query = $this->db->prepare($sql);
        return $query->execute() ? true : false;
    }

     public function calcularIdade($data){
         $idade = 0;

         $anoNasc = substr($data,0,4);
         $mesNasc = substr($data,5,2);
         $diaNasc = substr($data,-2);

         $idade = date("Y") - $anoNasc;
     
         if (date("m") < $mesNasc){
             $idade -= 1;
         } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
             $idade -= 1;
         }

         return $idade;
     }

}