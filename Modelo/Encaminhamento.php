<?php

class encaminhamento {

    private $id_encaminhamento;
    private $id_aluno;
    private $id_servidor;
    private $observacao;
    private $tentativa_resolucao;
    private $sugestao_resolucao;
    private $data_ocorrencia;
    private $tipo_encaminhamento;
    private $data;

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

    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }

    public function getId_encaminhamento() {
        return $this->id_encaminhamento;
    }

    function setId_encaminhamento($id_encaminhamento) {
        $this->id_encaminhamento = $id_encaminhamento;
    }

    public function getId_aluno() {
        return $this->id_aluno;
    }

    function setId_aluno($id_aluno) {
        $this->id_aluno = $id_aluno;
    }

    public function getId_servidor() {
        return $this->id_servidor;
    }

    function setId_servidor($id_servidor) {
        $this->id_servidor = $id_servidor;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getTipo_encaminhamento() {
        return $this->tipo_encaminhamento;
    }

    function setTipo_encaminhamento($tipo_encaminhamento) {
        $this->tipo_encaminhamento = $tipo_encaminhamento;
    }

    public function getTentativaResolucao()
    {
        return $this->tentativa_resolucao;
    }

    public function setTentativaResolucao($tentativa_resolucao)
    {
        $this->tentativa_resolucao = $tentativa_resolucao;
    }

    public function getSugestaoResolucao()
    {
        return $this->sugestao_resolucao;
    }

    public function setSugestaoResolucao($sugestao_resolucao)
    {
        $this->sugestao_resolucao = $sugestao_resolucao;
    }

    public function getDataOcorrencia()
    {
        return $this->data_ocorrencia;
    }

    public function setDataOcorrencia($data_ocorrencia)
    {
        $this->data_ocorrencia = $data_ocorrencia;
    }


}
