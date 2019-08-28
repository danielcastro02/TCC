<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Servidor</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/servidorPDO.php';
            include_once '../Modelo/Servidor.php';
            $servidorPDO = new servidorPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Servidor</h4>
                    <tr class="center">

                        <td class='center'>Id_usuario</td>
                        <td class='center'>Siape</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $servidorPDO->selectServidor();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $servidor = new servidor($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $servidor->getId_usuario()?></td>
                            <td class="center"><?php echo $servidor->getSiape()?></td>
                            <td class = 'center'><a href="./editarServidor.php?id=<?php echo $servidor->getid_usuario()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/servidorControle.php?function=deletar&id=<?php echo $servidor->getid_usuario()?>">Excluir</a></td>
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

