<?php 

class tentavivarefenc{

private $id_ten_enc;
private $id_encaminhamento;
private $id_tentativa_resolucao;


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

     public function getId_ten_enc(){
         return $this->id_ten_enc;
     }

     function setId_ten_enc($id_ten_enc){
          $this->id_ten_enc = $id_ten_enc;
     }

     public function getId_encaminhamento(){
         return $this->id_encaminhamento;
     }

     function setId_encaminhamento($id_encaminhamento){
          $this->id_encaminhamento = $id_encaminhamento;
     }

     public function getId_tentativa_resolucao(){
         return $this->id_tentativa_resolucao;
     }

     function setId_tentativa_resolucao($id_tentativa_resolucao){
          $this->id_tentativa_resolucao = $id_tentativa_resolucao;
     }

}