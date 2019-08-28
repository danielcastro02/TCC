<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listagem Aluno</title>
        <?php
            include_once '../Base/header.php';
            include_once '../Controle/alunoPDO.php';
            include_once '../Modelo/Aluno.php';
            $alunoPDO = new alunoPDO();
        ?>
        <body class="homeimg">
        <?php
        include_once '../Base/navBar.php';
        ?>
        <main>
            <div class="row " style="margin-top: 5vh;">
                <table class=" card col s10 offset-s1 center">
                <h4 class='center'>Listagem Aluno</h4>
                    <tr class="center">

                        <td class='center'>Id_usuario</td>
                        <td class='center'>Matricula</td>
                        <td class='center'>Apelido</td>
                        <td class='center'>Id_curso</td>
                        <td class='center'>Editar</td>
                        <td class='center'>Excluir</td>
                    </tr>
                    <?php
                    $stmt = $alunoPDO->selectAluno();
                        
                    if ($stmt) {
                        while ($linha = $stmt->fetch()) {
                            $aluno = new aluno($linha);
                            ?>
                        <tr>
                            <td class="center"><?php echo $aluno->getId_usuario()?></td>
                            <td class="center"><?php echo $aluno->getMatricula()?></td>
                            <td class="center"><?php echo $aluno->getApelido()?></td>
                            <td class="center"><?php echo $aluno->getId_curso()?></td>
                            <td class = 'center'><a href="./editarAluno.php?id=<?php echo $aluno->getid_usuario()?>">Editar</a></td>
                            <td class="center"><a href="../Controle/alunoControle.php?function=deletar&id=<?php echo $aluno->getid_usuario()?>">Excluir</a></td>
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

