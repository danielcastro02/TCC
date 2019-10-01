<?php

include_once __DIR__ . '/../Controle/conexao.php';
include_once __DIR__ . '/../Controle/usuarioPDO.php';
include_once __DIR__ . '/../Modelo/Aluno.php';
include_once __DIR__ . '/../Modelo/Usuario.php';

class AlunoPDO {
    /* inserir */

    function inserirAluno() {
        $aluno = new aluno($_POST);
        $usuario = new usuario($_POST);
        $usuarioPDO = new UsuarioPDO();
        $id_usuario = $usuarioPDO->insertParametros($usuario);
        if ($id_usuario == 'senha') {
            header('location: ../index.php?msg=alunoErroInsert');
        } else if ($id_usuario == 'usuarioErroInsert') {
            header('location: ../index.php?msg=alunoErroInsert');
        } else {
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into aluno values(:id_usuario , :matricula , :apelido , :id_curso);');

            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->bindValue(':matricula', $aluno->getMatricula());

            $stmt->bindValue(':apelido', $aluno->getApelido());

            $stmt->bindValue(':id_curso', $aluno->getId_curso());

            if ($stmt->execute()) {
                header('location: ../index.php?msg=alunoInserido');
            } else {
                header('location: ../index.php?msg=alunoErroInsert');
            }
        }
    }

    /* inserir */

    public function selectAluno() {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select u.* , a.* from aluno as a inner join usuario as u on u.id_usuario = a.id_usuario;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectAlunoId_usuario($id_usuario) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where id_usuario = :id_usuario;');
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectAlunoMatricula($matricula) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where matricula = :matricula;');
        $stmt->bindValue(':matricula', $matricula);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectAlunoApelido($apelido) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where apelido = :apelido;');
        $stmt->bindValue(':apelido', $apelido);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectAlunoId_curso($id_curso) {

        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from aluno where id_curso = :id_curso;');
        $stmt->bindValue(':id_curso', $id_curso);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function updateAluno(Aluno $aluno) {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update aluno set matricula = :matricula , apelido = :apelido , id_curso = :id_curso where id_usuario = :id_usuario;');
        $stmt->bindValue(':matricula', $aluno->getMatricula());

        $stmt->bindValue(':apelido', $aluno->getApelido());

        $stmt->bindValue(':id_curso', $aluno->getId_curso());

        $stmt->bindValue(':id_usuario', $aluno->getId_usuario());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteAluno($definir) {
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from aluno where id_usuario = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletar() {
        $this->deleteAluno($_GET['id']);
        header('location: ../Tela/listarAluno.php');
    }

    /* editar */

    function editar() {
        $aluno = new Aluno($_POST);
        if ($this->updateAluno($aluno) > 0) {
            header('location: ../index.php?msg=alunoAlterado');
        } else {
            header('location: ../index.php?msg=alunoErroAlterar');
        }
    }

    /* editar */
    /* chave */
}
