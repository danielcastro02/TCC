<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Motivoencaminhamento.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Motivoencaminhamento.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Motivoencaminhamento.php';
        }
    }
}


class MotivoencaminhamentoPDO{
    
             /*inserir*/
    function inserirMotivoencaminhamento() {
        $motivoencaminhamento = new motivoencaminhamento($_POST);
            $con = new conexao();
            $pdo = $con->getConexao();
            $stmt = $pdo->prepare('insert into Motivoencaminhamento values(default , :motivo , :tipo_encaminhamento);' );

            $stmt->bindValue(':motivo', $motivoencaminhamento->getMotivo());    
        
            $stmt->bindValue(':tipo_encaminhamento', $motivoencaminhamento->getTipo_encaminhamento());    
        
            if($stmt->execute()){ 
                header('location: ../index.php?msg=motivoencaminhamentoInserido');
            }else{
                header('location: ../index.php?msg=motivoencaminhamentoErroInsert');
            }
    }
    /*inserir*/
                
    

            

    public function selectMotivoencaminhamento(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivoencaminhamento ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMotivoencaminhamentoId_motivo($id_motivo){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivoencaminhamento where id_motivo = :id_motivo;');
        $stmt->bindValue(':id_motivo', $id_motivo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMotivoencaminhamentoMotivo($motivo){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivoencaminhamento where motivo = :motivo;');
        $stmt->bindValue(':motivo', $motivo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMotivoencaminhamentoTipo_encaminhamento($tipo_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivoencaminhamento where tipo_encaminhamento = :tipo_encaminhamento;');
        $stmt->bindValue(':tipo_encaminhamento', $tipo_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateMotivoencaminhamento(Motivoencaminhamento $motivoencaminhamento){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update motivoencaminhamento set motivo = :motivo , tipo_encaminhamento = :tipo_encaminhamento where id_motivo = :id_motivo;');
        $stmt->bindValue(':motivo', $motivoencaminhamento->getMotivo());
        
        $stmt->bindValue(':tipo_encaminhamento', $motivoencaminhamento->getTipo_encaminhamento());
        
        $stmt->bindValue(':id_motivo', $motivoencaminhamento->getId_motivo());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteMotivoencaminhamento($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from motivoencaminhamento where id_motivo = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteMotivoencaminhamento($_GET['id']);
        header('location: ../Tela/listarMotivoencaminhamento.php');
    }



            /*editar*/
            function editar() {
                $motivoencaminhamento = new Motivoencaminhamento($_POST);
                    if($this->updateMotivoencaminhamento($motivoencaminhamento) > 0){
                        header('location: ../index.php?msg=motivoencaminhamentoAlterado');
                    } else {
                        header('location: ../index.php?msg=motivoencaminhamentoErroAlterar');
                    }
            }
            /*editar*/
            /*chave*/
            }
                