<?php

include_once __DIR__ . '/../Controle/conexao.php';
include_once __DIR__ . '/../ModeloServidor.php';
include_once __DIR__ . '/../Controle/usuarioPDO.php';
include_once __DIR__ . '/../Modelo/Usuario.php';

class ServidorPDO {
    /* inserir */

    function inserirServidor() {
        $servidor = new servidor($_POST);
        $con = new conexao();
        $usuario = new usuario($_POST);
        $usuarioPDO = new UsuarioPDO();
        $id_usuario = $usuarioPDO->insertParametros($usuario);
        if ($id_usuario == 'senha') {
            header('location: ../index.php?msg=alunoErroInsert');
        } else if ($id_usuario == 'usuarioErroInsert') {
            header('location: ../index.php?msg=alunoErroInsert');
        } else {
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into servidor values(:id_usuario , :siape);');
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->bindValue(':siape', $servidor->getSiape());
            if ($stmt->execute()) {
                header('location: ../index.php?msg=servidorInserido');
            } else {
                header('location: ../index.php?msg=servidorErroInsert');
            }
        }
    }

    /* inserir */

    public function selectServidor() {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from servidor ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectServidorId_usuario($id_usuario) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from servidor where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectServidorSiape($siape) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from servidor where siape = :siape;');
        $stmt->bindValue(':siape', $siape);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function updateServidor(Servidor $servidor) {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update servidor set siape = :siape where id_usuario = :id_usuario;');
        $stmt->bindValue(':siape', $servidor->getSiape());

        $stmt->bindValue(':id_usuario', $servidor->getId_usuario());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteServidor($definir) {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from servidor where id_usuario = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletar() {
        $this->deleteServidor($_GET['id']);
        header('location: ../Tela/listarServidor.php');
    }

    /* editar */

    function editar() {
        $servidor = new Servidor($_POST);
        if ($this->updateServidor($servidor) > 0) {
            header('location: ../index.php?msg=servidorAlterado');
        } else {
            header('location: ../index.php?msg=servidorErroAlterar');
        }
    }

    /* editar */
    /* chave */
}
