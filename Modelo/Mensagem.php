<?php 

class mensagem{

private $id_mensagem;
private $id_remetente;
private $id_destinatario;
private $assunto;
private $mensagem;


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

     public function getId_mensagem(){
         return $this->id_mensagem;
     }

     function setId_mensagem($id_mensagem){
          $this->id_mensagem = $id_mensagem;
     }

     public function getId_remetente(){
         return $this->id_remetente;
     }

     function setId_remetente($id_remetente){
          $this->id_remetente = $id_remetente;
     }

     public function getId_destinatario(){
         return $this->id_destinatario;
     }

     function setId_destinatario($id_destinatario){
          $this->id_destinatario = $id_destinatario;
     }

     public function getAssunto(){
         return $this->assunto;
     }

     function setAssunto($assunto){
          $this->assunto = $assunto;
     }

     public function getMensagem(){
         return $this->mensagem;
     }

     function setMensagem($mensagem){
          $this->mensagem = $mensagem;
     }

}