<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Usuario</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/usuarioPDO.php';
            include_once '../Modelo/Usuario.php';
            $usuarioPDO = new usuarioPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Usuario</h4>
                    <tr class="center">

                        <td class='center'>Id_usuario</td>
                        <td class='center'>Nome</td>
                        <td class='center'>Email</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $usuarioPDO->selectUsuario();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $usuario = new usuario($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $usuario->getId_usuario()?></td>
                            <td class="center"><?php echo $usuario->getNome()?></td>
                            <td class="center"><?php echo $usuario->getEmail()?></td>
                            <td class="center"><a href="../Controle/usuarioControle.php?function=deletar&id=<?php echo $usuario->getid_usuario()?>">Excluir</a></td>
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

