<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Encaminhamento.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Encaminhamento.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Encaminhamento.php';
        }
    }
}


class EncaminhamentoPDO{
    
             /*inserir*/
    function inserirEncaminhamento() {
        $encaminhamento = new encaminhamento($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Encaminhamento values(default , :id_aluno , :id_servidor , :gravidade , :observacao , :tipo_encaminhamento);' );

            $stmt->bindValue(':id_aluno', $encaminhamento->getId_aluno());    
        
            $stmt->bindValue(':id_servidor', $encaminhamento->getId_servidor());    
        
            $stmt->bindValue(':gravidade', $encaminhamento->getGravidade());    
        
            $stmt->bindValue(':observacao', $encaminhamento->getObservacao());    
        
            $stmt->bindValue(':tipo_encaminhamento', $encaminhamento->getTipo_encaminhamento());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=encaminhamentoInserido');
            }else{
                header('location: ../index.php?msg=encaminhamentoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectEncaminhamento(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectEncaminhamentoId_encaminhamento($id_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento where id_encaminhamento = :id_encaminhamento;');
        $stmt->bindValue(':id_encaminhamento', $id_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectEncaminhamentoId_aluno($id_aluno){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento where id_aluno = :id_aluno;');
        $stmt->bindValue(':id_aluno', $id_aluno);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectEncaminhamentoId_servidor($id_servidor){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento where id_servidor = :id_servidor;');
        $stmt->bindValue(':id_servidor', $id_servidor);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectEncaminhamentoGravidade($gravidade){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento where gravidade = :gravidade;');
        $stmt->bindValue(':gravidade', $gravidade);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectEncaminhamentoObservacao($observacao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento where observacao = :observacao;');
        $stmt->bindValue(':observacao', $observacao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectEncaminhamentoTipo_encaminhamento($tipo_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from encaminhamento where tipo_encaminhamento = :tipo_encaminhamento;');
        $stmt->bindValue(':tipo_encaminhamento', $tipo_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateEncaminhamento(Encaminhamento $encaminhamento){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update encaminhamento set id_aluno = :id_aluno , id_servidor = :id_servidor , gravidade = :gravidade , observacao = :observacao , tipo_encaminhamento = :tipo_encaminhamento where id_encaminhamento = :id_encaminhamento;');
        $stmt->bindValue(':id_aluno', $encaminhamento->getId_aluno());
        
        $stmt->bindValue(':id_servidor', $encaminhamento->getId_servidor());
        
        $stmt->bindValue(':gravidade', $encaminhamento->getGravidade());
        
        $stmt->bindValue(':observacao', $encaminhamento->getObservacao());
        
        $stmt->bindValue(':tipo_encaminhamento', $encaminhamento->getTipo_encaminhamento());
        
        $stmt->bindValue(':id_encaminhamento', $encaminhamento->getId_encaminhamento());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteEncaminhamento($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from encaminhamento where id_encaminhamento = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteEncaminhamento($_GET['id']);
        header('location: ../Tela/listarEncaminhamento.php');
    }



            /*editar*/
            function editar() {
                $encaminhamento = new Encaminhamento($_POST);
                    if($this->updateEncaminhamento($encaminhamento) > 0){
                        header('location: ../index.php?msg=encaminhamentoAlterado');
                    } else {
                        header('location: ../index.php?msg=encaminhamentoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                