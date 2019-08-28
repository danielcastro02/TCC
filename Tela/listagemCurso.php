<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Curso</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/cursoPDO.php';
            include_once '../Modelo/Curso.php';
            $cursoPDO = new cursoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Curso</h4>
                    <tr class="center">

                        <td class='center'>Id_curso</td>
                        <td class='center'>Nome</td>
                        <td class='center'>Turno</td>
                        <td class='center'>Nivel</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $cursoPDO->selectCurso();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $curso = new curso($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $curso->getId_curso()?></td>
                            <td class="center"><?php echo $curso->getNome()?></td>
                            <td class="center"><?php echo $curso->getTurno()?></td>
                            <td class="center"><?php echo $curso->getNivel()?></td>
                            <td class = 'center'><a href="./editarCurso.php?id=<?php echo $curso->getid_curso()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/cursoControle.php?function=deletar&id=<?php echo $curso->getid_curso()?>">Excluir</a></td>
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

