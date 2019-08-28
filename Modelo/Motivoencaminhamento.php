<?php 

class motivoencaminhamento{

private $id_motivo;
private $motivo;
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

     public function getId_motivo(){
         return $this->id_motivo;
     }

     function setId_motivo($id_motivo){
          $this->id_motivo = $id_motivo;
     }

     public function getMotivo(){
         return $this->motivo;
     }

     function setMotivo($motivo){
          $this->motivo = $motivo;
     }

     public function getTipo_encaminhamento(){
         return $this->tipo_encaminhamento;
     }

     function setTipo_encaminhamento($tipo_encaminhamento){
          $this->tipo_encaminhamento = $tipo_encaminhamento;
     }

}