<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Sugestaorefenc.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Sugestaorefenc.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Sugestaorefenc.php';
        }
    }
}


class SugestaorefencPDO{
    /*inserir*/
    function inserirSugestaorefenc() {
        $sugestaorefenc = new sugestaorefenc($_POST);
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('insert into sugestaorefenc values(:id_sug_enc , :id_encaminhamento , :id_sugestao_resolucao);' );

        $stmt->bindValue(':id_sug_enc', $sugestaorefenc->getId_sug_enc());    
        
        $stmt->bindValue(':id_encaminhamento', $sugestaorefenc->getId_encaminhamento());    
        
        $stmt->bindValue(':id_sugestao_resolucao', $sugestaorefenc->getId_sugestao_resolucao());    
        
        if($stmt->execute()){ 
            header('location: ../index.php?msg=sugestaorefencInserido');
        }else{
            header('location: ../index.php?msg=sugestaorefencErroInsert');
        }
    }
    /*inserir*/
    

            

    public function selectSugestaorefenc(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaorefenc ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectSugestaorefencId_sug_enc($id_sug_enc){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaorefenc where id_sug_enc = :id_sug_enc;');
        $stmt->bindValue(':id_sug_enc', $id_sug_enc);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectSugestaorefencId_encaminhamento($id_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaorefenc where id_encaminhamento = :id_encaminhamento;');
        $stmt->bindValue(':id_encaminhamento', $id_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectSugestaorefencId_sugestao_resolucao($id_sugestao_resolucao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from sugestaorefenc where id_sugestao_resolucao = :id_sugestao_resolucao;');
        $stmt->bindValue(':id_sugestao_resolucao', $id_sugestao_resolucao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateSugestaorefenc(Sugestaorefenc $sugestaorefenc){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update sugestaorefenc set id_encaminhamento = :id_encaminhamento , id_sugestao_resolucao = :id_sugestao_resolucao where id_sug_enc = :id_sug_enc;');
        $stmt->bindValue(':id_encaminhamento', $sugestaorefenc->getId_encaminhamento());
        
        $stmt->bindValue(':id_sugestao_resolucao', $sugestaorefenc->getId_sugestao_resolucao());
        
        $stmt->bindValue(':id_sug_enc', $sugestaorefenc->getId_sug_enc());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteSugestaorefenc($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from sugestaorefenc where id_sug_enc = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteSugestaorefenc($_GET['id']);
        header('location: ../Tela/listarSugestaorefenc.php');
    }


/*chave*/}
