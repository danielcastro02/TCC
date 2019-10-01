<?php

include_once __DIR__ . "/Usuario.php";

class aluno extends usuario {

    private $matricula;
    private $apelido;
    private $id_curso;

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

    public function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getApelido() {
        return $this->apelido;
    }

    function setApelido($apelido) {
        $this->apelido = $apelido;
    }

    public function getId_curso() {
        return $this->id_curso;
    }

    function setId_curso($id_curso) {
        $this->id_curso = $id_curso;
    }

}
