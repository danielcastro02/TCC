<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Motivorefenc.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Motivorefenc.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Motivorefenc.php';
        }
    }
}


class MotivorefencPDO{
    /*inserir*/
    function inserirMotivorefenc() {
        $motivorefenc = new motivorefenc($_POST);
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('insert into motivorefenc values(:id_mot_enc , :id_encaminhamento , :id_motivo);' );

        $stmt->bindValue(':id_mot_enc', $motivorefenc->getId_mot_enc());    
        
        $stmt->bindValue(':id_encaminhamento', $motivorefenc->getId_encaminhamento());    
        
        $stmt->bindValue(':id_motivo', $motivorefenc->getId_motivo());    
        
        if($stmt->execute()){ 
            header('location: ../index.php?msg=motivorefencInserido');
        }else{
            header('location: ../index.php?msg=motivorefencErroInsert');
        }
    }
    /*inserir*/
    

            

    public function selectMotivorefenc(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivorefenc ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMotivorefencId_mot_enc($id_mot_enc){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivorefenc where id_mot_enc = :id_mot_enc;');
        $stmt->bindValue(':id_mot_enc', $id_mot_enc);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMotivorefencId_encaminhamento($id_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivorefenc where id_encaminhamento = :id_encaminhamento;');
        $stmt->bindValue(':id_encaminhamento', $id_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectMotivorefencId_motivo($id_motivo){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from motivorefenc where id_motivo = :id_motivo;');
        $stmt->bindValue(':id_motivo', $id_motivo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateMotivorefenc(Motivorefenc $motivorefenc){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update motivorefenc set id_encaminhamento = :id_encaminhamento , id_motivo = :id_motivo where id_mot_enc = :id_mot_enc;');
        $stmt->bindValue(':id_encaminhamento', $motivorefenc->getId_encaminhamento());
        
        $stmt->bindValue(':id_motivo', $motivorefenc->getId_motivo());
        
        $stmt->bindValue(':id_mot_enc', $motivorefenc->getId_mot_enc());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteMotivorefenc($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from motivorefenc where id_mot_enc = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteMotivorefenc($_GET['id']);
        header('location: ../Tela/listarMotivorefenc.php');
    }


/*chave*/}
