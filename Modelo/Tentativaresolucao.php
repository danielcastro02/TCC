<?php 

class tentativaresolucao{

private $id_tentativa;
private $tentativa_resolucao;
private $tipo_encaminhamento;


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

     public function getId_tentativa(){
         return $this->id_tentativa;
     }

     function setId_tentativa($id_tentativa){
          $this->id_tentativa = $id_tentativa;
     }

     public function getTentativa_resolucao(){
         return $this->tentativa_resolucao;
     }

     function setTentativa_resolucao($tentativa_resolucao){
          $this->tentativa_resolucao = $tentativa_resolucao;
     }

     public function getTipo_encaminhamento(){
         return $this->tipo_encaminhamento;
     }

     function setTipo_encaminhamento($tipo_encaminhamento){
          $this->tipo_encaminhamento = $tipo_encaminhamento;
     }

}