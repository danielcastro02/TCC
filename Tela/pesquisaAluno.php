<?php
include_once '../Controle/alunoPDO.php';
include_once '../Modelo/Aluno.php';
$alunoPDO = new AlunoPDO();
$alunostmt = $alunoPDO->selectPesquisa(urldecode($_GET['pesquisa']));

if($alunostmt){
    while($linha = $alunostmt->fetch()){
        $aluno = new aluno($linha);
        echo "<option value='".$aluno->getId_usuario()."'>".$aluno->getNome()." ".$aluno->getMatricula()."</option>";
    }
}else{
    echo "<option>Nenhum resultado</option>";
}
