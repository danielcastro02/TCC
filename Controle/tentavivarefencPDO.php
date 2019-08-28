<?php

if (realpath('./index.php')) {
    include_once './Controle/conexao.php';
    include_once './Modelo/Tentavivarefenc.php';
} else {
    if (realpath('../index.php')) {
        include_once '../Controle/conexao.php';
        include_once '../Modelo/Tentavivarefenc.php';
    } else {
        if (realpath('../../index.php')) {
            include_once '../../Controle/conexao.php';
            include_once '../../Modelo/Tentavivarefenc.php';
        }
    }
}


class TentavivarefencPDO{
    /*inserir*/
    function inserirTentavivarefenc() {
        $tentavivarefenc = new tentavivarefenc($_POST);
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('insert into tentavivarefenc values(:id_ten_enc , :id_encaminhamento , :id_tentativa_resolucao);' );

        $stmt->bindValue(':id_ten_enc', $tentavivarefenc->getId_ten_enc());    
        
        $stmt->bindValue(':id_encaminhamento', $tentavivarefenc->getId_encaminhamento());    
        
        $stmt->bindValue(':id_tentativa_resolucao', $tentavivarefenc->getId_tentativa_resolucao());    
        
        if($stmt->execute()){ 
            header('location: ../index.php?msg=tentavivarefencInserido');
        }else{
            header('location: ../index.php?msg=tentavivarefencErroInsert');
        }
    }
    /*inserir*/
    

            

    public function selectTentavivarefenc(){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentavivarefenc ;');
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTentavivarefencId_ten_enc($id_ten_enc){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentavivarefenc where id_ten_enc = :id_ten_enc;');
        $stmt->bindValue(':id_ten_enc', $id_ten_enc);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTentavivarefencId_encaminhamento($id_encaminhamento){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentavivarefenc where id_encaminhamento = :id_encaminhamento;');
        $stmt->bindValue(':id_encaminhamento', $id_encaminhamento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    

                    
    public function selectTentavivarefencId_tentativa_resolucao($id_tentativa_resolucao){
            
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('select * from tentavivarefenc where id_tentativa_resolucao = :id_tentativa_resolucao;');
        $stmt->bindValue(':id_tentativa_resolucao', $id_tentativa_resolucao);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        } else {
            return false;
        }
    }
    
 
    public function updateTentavivarefenc(Tentavivarefenc $tentavivarefenc){        
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('update tentavivarefenc set id_encaminhamento = :id_encaminhamento , id_tentativa_resolucao = :id_tentativa_resolucao where id_ten_enc = :id_ten_enc;');
        $stmt->bindValue(':id_encaminhamento', $tentavivarefenc->getId_encaminhamento());
        
        $stmt->bindValue(':id_tentativa_resolucao', $tentavivarefenc->getId_tentativa_resolucao());
        
        $stmt->bindValue(':id_ten_enc', $tentavivarefenc->getId_ten_enc());
        $stmt->execute();
        return $stmt->rowCount();
    }            
    
    public function deleteTentavivarefenc($definir){
        $con = new conexao();
        $pdo = $con->getConexao();
        $stmt = $pdo->prepare('delete from tentavivarefenc where id_ten_enc = :definir ;');
        $stmt->bindValue(':definir', $definir);
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function deletar(){
        $this->deleteTentavivarefenc($_GET['id']);
        header('location: ../Tela/listarTentavivarefenc.php');
    }


/*chave*/}
