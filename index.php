<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div id="fundo">
        <h1>Calculadora de IMC</h1>
        <form action="index.php" method="post">
            <div id="item">
                <label>Digite seu nome:</label>
                <input type="text" id="caixa" name="nome" placeholder="Vívian Gabriele"><br> 
            </div>
            <div id="item">
                <label>Digite sua altura:</label>
                <input type="text" id="caixa" name="altura" placeholder="1.70"><br> 
            </div>
            <div id="item">
                <label>Digite seu peso:</label>
                <input type="text" id="caixa" name="peso" placeholder="82"><br>
            </div>
            <div id="item">
                <input type="submit" id="submit" name="submit" value="submit">
            </div>
            <div id="resultado">
                <?php
                    $imc = null;
                    $nome = $_POST["nome"];
                    $altura = $_POST["altura"];
                    $peso = $_POST["peso"];
                    if(isset($_POST["submit"])) {
                        if(!empty($altura) && !empty($peso)) {
                            $imc = $peso/($altura * $altura);
                            $imc = round($imc, 2);
                            echo "<label>{$nome}, seu IMC é {$imc}.</label>";
                        }
                    }
                    if(!$imc) {
                        if(!$altura && !$peso) {
                            echo "<label>Valores inválidos!</label>";
                        } elseif(!$peso) {
                            echo "<label>Peso inválido!</label>";
                        } elseif(!$altura) {
                            echo "<label>Altura inválida!</label>";
                        }
                    } else if($imc <= 18.5){
                        echo "<label>Baixo peso</label>";
                    } elseif($imc > 18.5 && $imc < 25) {
                        echo "<label>Peso normal</label>";
                    } elseif($imc >= 25 && $imc < 30) {
                        echo "<label>Sobrepeso</label>";
                    } elseif($imc >= 30 && $imc < 35) {
                        echo "<label>Obesidade grau I</label>";
                    } elseif($imc >= 35 && $imc < 40) {
                        echo "<label>Obesidade grau II</label>";
                    } elseif($imc > 40) {
                        echo "<label>Obesidade grau III</label>";
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>