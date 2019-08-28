<?php 

class motivorefenc{

private $id_mot_enc;
private $id_encaminhamento;
private $id_motivo;


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

     public function getId_mot_enc(){
         return $this->id_mot_enc;
     }

     function setId_mot_enc($id_mot_enc){
          $this->id_mot_enc = $id_mot_enc;
     }

     public function getId_encaminhamento(){
         return $this->id_encaminhamento;
     }

     function setId_encaminhamento($id_encaminhamento){
          $this->id_encaminhamento = $id_encaminhamento;
     }

     public function getId_motivo(){
         return $this->id_motivo;
     }

     function setId_motivo($id_motivo){
          $this->id_motivo = $id_motivo;
     }

}