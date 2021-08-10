<?php

namespace Source\Controllers;

use Source\Model\Desenv;
use Source\Core\Controller;

class DesenvController extends Controller {

    private $desenvolvedores;

    public function __construct() {
        $this->desenvolvedores = new Desenv();
    }

    public function home() {
         $this->loadTemplate('main', array());
    }

    public function list() {
        $data = $this->desenvolvedores->list();
        return json_encode($data);
    }

    public function register(){
        $this->loadTemplate('desenvolvedor', array());
    }

    public function update($request, $response, $args){
        $data = $this->desenvolvedores->list($args['id']);
        $this->loadTemplate('desenvolvedor', $data);
    }

    public function save(){

        $result = array(
            "status" => false,
            "error" => "",
            "result" => ""
        );

        if(empty($_POST)){
            $result['error'] = "Erro ao cadastrar o desenvolvedor!";
            return json_encode($result);
        }

        $dados = array();
        $dados['id'] = isset($_POST['id']) ? addslashes($_POST['id']) : "";
        $dados['nome'] = isset($_POST['nome']) ? addslashes($_POST['nome']) : "";
        $dados['nascimento'] = isset($_POST['nascimento']) ? $_POST['nascimento'] : "";
        $dados['idade'] = isset($_POST['nascimento']) ? $this->desenvolvedores->calcularIdade($_POST['nascimento']): "";
        $dados['hobby'] = isset($_POST['hobby']) ? addslashes($_POST['hobby']) : "";
        $dados['sexo'] = isset($_POST['sexo']) ? addslashes($_POST['sexo']) : "";
        
        if(empty($dados['nome'])){
            $result['error'] = "Campo obrigatório: Nome";
            return json_encode($result);
        }

        if(empty($dados['nascimento'])){
            $result['error'] = "Campo obrigatório: Nascimento";
            return json_encode($result);
        }

        if(empty($dados['sexo'])){
            $result['error'] = "Campo obrigatório: Sexo";
            return json_encode($result);
        }
    
        if(!$this->desenvolvedores->save($dados)){
            $result['error'] = empty($dados['id']) ? "Erro ao cadastrar o desenvolvedor!" : "Erro ao editar o desenvolvedor!";
            return json_encode($result);
        }
        
        $result['status'] = true;
        $result['result'] = "Desenvolvedor registrado com sucesso!";
        return json_encode($result);
    }   

    public function delete($request, $response, $args){

        $result = array(
            "status" => false,
            "error" => "",
            "result" => ""
        );

        if(empty($args['id'])) {
            $result['error'] = "Desenvolvedor não encontrado!";
            return json_encode($result);
        }

        if(!$this->desenvolvedores->delete($args['id'])){
            $result['error'] = "Erro ao remover o desenvolvedor!";
            return json_encode($result);
        }
        
        $result['status'] = true;
        $result['result'] = "Desenvolvedor removido com sucesso! ";
        return json_encode($result);
    }
      
}