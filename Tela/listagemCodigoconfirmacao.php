<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Codigoconfirmacao</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/codigoconfirmacaoPDO.php';
            include_once '../Modelo/Codigoconfirmacao.php';
            $codigoconfirmacaoPDO = new codigoconfirmacaoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Codigoconfirmacao</h4>
                    <tr class="center">

                        <td class='center'>Id_codigo</td>
                        <td class='center'>Id_usuario</td>
                        <td class='center'>Codigo</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $codigoconfirmacaoPDO->selectCodigoconfirmacao();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $codigoconfirmacao = new codigoconfirmacao($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $codigoconfirmacao->getId_codigo()?></td>
                            <td class="center"><?php echo $codigoconfirmacao->getId_usuario()?></td>
                            <td class="center"><?php echo $codigoconfirmacao->getCodigo()?></td>
                            <td class = 'center'><a href="./editarCodigoconfirmacao.php?id=<?php echo $codigoconfirmacao->getid_codigo()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/codigoconfirmacaoControle.php?function=deletar&id=<?php echo $codigoconfirmacao->getid_codigo()?>">Excluir</a></td>
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

