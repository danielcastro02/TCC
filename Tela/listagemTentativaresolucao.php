<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Tentativaresolucao</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/tentativaresolucaoPDO.php';
            include_once '../Modelo/Tentativaresolucao.php';
            $tentativaresolucaoPDO = new tentativaresolucaoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Tentativaresolucao</h4>
                    <tr class="center">

                        <td class='center'>Id_tentativa</td>
                        <td class='center'>Tentativa_resolucao</td>
                        <td class='center'>Tipo_encaminhamento</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $tentativaresolucaoPDO->selectTentativaresolucao();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $tentativaresolucao = new tentativaresolucao($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $tentativaresolucao->getId_tentativa()?></td>
                            <td class="center"><?php echo $tentativaresolucao->getTentativa_resolucao()?></td>
                            <td class="center"><?php echo $tentativaresolucao->getTipo_encaminhamento()?></td>
                            <td class = 'center'><a href="./editarTentativaresolucao.php?id=<?php echo $tentativaresolucao->getid_tentativa()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/tentativaresolucaoControle.php?function=deletar&id=<?php echo $tentativaresolucao->getid_tentativa()?>">Excluir</a></td>
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

