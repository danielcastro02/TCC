<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?php
    include_once '../Base/header.php';
    include_once '../Modelo/Parametros.php';
    $parametros = new parametros();
    ?>
    <title><?php echo $parametros->getNome_empresa(); ?></title>

<body class="homeimg">
<?php
include_once '../Base/iNav.php';
?>
<main>
    <div class="row">
        <div class="col s12 l6 m8 offset-l3 offset-m2">
            <div class="row card">
                <form action="../Controle/alunoControle.php?function=">

                </form>
            </div>
        </div>
    </div>

</main>
<?php
include_once '../Base/footer.php';
?>

</body>
</html>

