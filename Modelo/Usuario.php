<?php 

class usuario{

private $id_usuario;
private $nome;
private $email;
private $senha;
private $administrador;


public function __construct() {
    if (func_num_args() != 0) {
        $atributos = func_get_args()[0];
        foreach ($atributos as $atributo => $valor) {
                if (isset($valor)) {
                    $this->$atributo = $valor;
                }
            }
        }
    }

    function atualizar($vetor) {
        foreach ($vetor as $atributo => $valor) {
            if (isset($valor)) {
                $this->$atributo = $valor;
            }
        }
    }

     public function getId_usuario(){
         return $this->id_usuario;
     }

     function setId_usuario($id_usuario){
          $this->id_usuario = $id_usuario;
     }

     public function getNome(){
         return $this->nome;
     }

     function setNome($nome){
          $this->nome = $nome;
     }

     public function getEmail(){
         return $this->email;
     }

     function setEmail($email){
          $this->email = $email;
     }

     public function getSenha(){
         return $this->senha;
     }

     function setSenha($senha){
          $this->senha = $senha;
     }

     public function getAdministrador(){
         return $this->administrador;
     }

     function setAdministrador($administrador){
          $this->administrador = $administrador;
     }

}