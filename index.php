<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Salário</title>
</head>

<body>
    <?php
     $salmin = 1_518.00;
    $valsal = $_POST['valorsal'] ?? $salmin;

    ?>

    <main>
        <h1>Informe seu salário</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <label for="salario">Salário R$</label>
            <input type="number" name="valorsal" id="valorsal" value="<?= $valsal ?>" step="0.01">
            <p>Considerando o salário mínimo de <strong>R$<?= number_format($salmin,2,",",".") ?></strong> </p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>

        <?php

       
        $conta = $valsal / $salmin;
        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $resto = $valsal % $salmin;


        echo "<p>Quem recebe um salário de ". numfmt_format_currency($padrao,$valsal,"BRL")." ganha <strong>".floor($conta)." salários mínimos</strong> + " . numfmt_format_currency($padrao,$resto, "BRL").".</p>";

        ?>
    </section>
</body>

</html>