<?php 

class sugestaoresolucao{

private $id_sugestao;
private $sugestao_resolucao;
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

     public function getId_sugestao(){
         return $this->id_sugestao;
     }

     function setId_sugestao($id_sugestao){
          $this->id_sugestao = $id_sugestao;
     }

     public function getSugestao_resolucao(){
         return $this->sugestao_resolucao;
     }

     function setSugestao_resolucao($sugestao_resolucao){
          $this->sugestao_resolucao = $sugestao_resolucao;
     }

     public function getTipo_encaminhamento(){
         return $this->tipo_encaminhamento;
     }

     function setTipo_encaminhamento($tipo_encaminhamento){
          $this->tipo_encaminhamento = $tipo_encaminhamento;
     }

}