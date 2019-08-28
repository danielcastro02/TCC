<?php 

class sugestaorefenc{

private $id_sug_enc;
private $id_encaminhamento;
private $id_sugestao_resolucao;


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

     public function getId_sug_enc(){
         return $this->id_sug_enc;
     }

     function setId_sug_enc($id_sug_enc){
          $this->id_sug_enc = $id_sug_enc;
     }

     public function getId_encaminhamento(){
         return $this->id_encaminhamento;
     }

     function setId_encaminhamento($id_encaminhamento){
          $this->id_encaminhamento = $id_encaminhamento;
     }

     public function getId_sugestao_resolucao(){
         return $this->id_sugestao_resolucao;
     }

     function setId_sugestao_resolucao($id_sugestao_resolucao){
          $this->id_sugestao_resolucao = $id_sugestao_resolucao;
     }

}