<?php
$pontos = "";
if (realpath("./index.php")) {
    $pontos = './';
} else {
    if (realpath("../index.php")) {
        $pontos = '../';
    } else {
        if (realpath("../../index.php")) {
            $pontos = '../../';
        }
    }
}
?>

<nav class="nav-extended white">
    <div class="nav-wrapper" style="width: 100vw; margin-left: auto; margin-right: auto;">
        <a href="<?php echo $pontos; ?>./Tela/home.php" class="brand-logo left black-text">Sloth</a>
        <ul class="right hide-on-med-and-down">



        </ul>
        </li>
    </div>
</nav>
        <!--usuario-->
        <!--proximo-->


























        </ul>
    </div>
</nav>
<script>
    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
    });
</script>
