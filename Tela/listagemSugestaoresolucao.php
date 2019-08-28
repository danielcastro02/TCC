<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Sugestaoresolucao</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/sugestaoresolucaoPDO.php';
            include_once '../Modelo/Sugestaoresolucao.php';
            $sugestaoresolucaoPDO = new sugestaoresolucaoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Sugestaoresolucao</h4>
                    <tr class="center">

                        <td class='center'>Id_sugestao</td>
                        <td class='center'>Sugestao_resolucao</td>
                        <td class='center'>Tipo_encaminhamento</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $sugestaoresolucaoPDO->selectSugestaoresolucao();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $sugestaoresolucao = new sugestaoresolucao($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $sugestaoresolucao->getId_sugestao()?></td>
                            <td class="center"><?php echo $sugestaoresolucao->getSugestao_resolucao()?></td>
                            <td class="center"><?php echo $sugestaoresolucao->getTipo_encaminhamento()?></td>
                            <td class = 'center'><a href="./editarSugestaoresolucao.php?id=<?php echo $sugestaoresolucao->getid_sugestao()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/sugestaoresolucaoControle.php?function=deletar&id=<?php echo $sugestaoresolucao->getid_sugestao()?>">Excluir</a></td>
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

