<?php 

class servidor{

private $id_usuario;
private $siape;


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

     public function getSiape(){
         return $this->siape;
     }

     function setSiape($siape){
          $this->siape = $siape;
     }

}