<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Encaminhamento</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/encaminhamentoPDO.php';
            include_once '../Modelo/Encaminhamento.php';
            $encaminhamentoPDO = new encaminhamentoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Encaminhamento</h4>
                    <tr class="center">

                        <td class='center'>Id_encaminhamento</td>
                        <td class='center'>Id_aluno</td>
                        <td class='center'>Id_servidor</td>
                        <td class='center'>Gravidade</td>
                        <td class='center'>Observacao</td>
                        <td class='center'>Tipo_encaminhamento</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $encaminhamentoPDO->selectEncaminhamento();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $encaminhamento = new encaminhamento($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $encaminhamento->getId_encaminhamento()?></td>
                            <td class="center"><?php echo $encaminhamento->getId_aluno()?></td>
                            <td class="center"><?php echo $encaminhamento->getId_servidor()?></td>
                            <td class="center"><?php echo $encaminhamento->getGravidade()?></td>
                            <td class="center"><?php echo $encaminhamento->getObservacao()?></td>
                            <td class="center"><?php echo $encaminhamento->getTipo_encaminhamento()?></td>
                            <td class = 'center'><a href="./editarEncaminhamento.php?id=<?php echo $encaminhamento->getid_encaminhamento()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/encaminhamentoControle.php?function=deletar&id=<?php echo $encaminhamento->getid_encaminhamento()?>">Excluir</a></td>
                        </tr>
                                <?php
                        }
                    }
                    ?>
                    </table>
            </div>
        </main>
        <?php
        include_once '../Base/footer.php';
        ?>
    </body>
</html>

