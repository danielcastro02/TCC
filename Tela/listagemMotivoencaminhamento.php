<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Motivoencaminhamento</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/motivoencaminhamentoPDO.php';
            include_once '../Modelo/Motivoencaminhamento.php';
            $motivoencaminhamentoPDO = new motivoencaminhamentoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Motivoencaminhamento</h4>
                    <tr class="center">

                        <td class='center'>Id_motivo</td>
                        <td class='center'>Motivo</td>
                        <td class='center'>Tipo_encaminhamento</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $motivoencaminhamentoPDO->selectMotivoencaminhamento();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $motivoencaminhamento = new motivoencaminhamento($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $motivoencaminhamento->getId_motivo()?></td>
                            <td class="center"><?php echo $motivoencaminhamento->getMotivo()?></td>
                            <td class="center"><?php echo $motivoencaminhamento->getTipo_encaminhamento()?></td>
                            <td class = 'center'><a href="./editarMotivoencaminhamento.php?id=<?php echo $motivoencaminhamento->getid_motivo()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/motivoencaminhamentoControle.php?function=deletar&id=<?php echo $motivoencaminhamento->getid_motivo()?>">Excluir</a></td>
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

