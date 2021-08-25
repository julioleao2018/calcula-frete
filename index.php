<?php

include('./calcula-frete.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $largura = $_POST['largura'];
    $comprimento = $_POST['comprimento'];
    $servico = $_POST['servico'];

    $_resultado = calculaFrete(
        $servico,
        $origem,
        $destino,
        $peso,
        $altura,
        $largura,
        $comprimento,
        0
    );
}
?>

<html>

<head>
    <title>Calcular Frete</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">CALCULO FRETE CORREIOS</h3>
        <br />
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">Informe os dados para calcular o FRETE</div>

            <form method="post">
                <div class="row panel-body" align="left">
                    <div class="col-md-12">

                        <div class="col-md-3">
                            <label>SERVIÇO</label>
                            <select class="form-control" name="servico">
                                <option value="SEDEX">SEDEX</option>
                                <option value="PAC">PAC</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>CEP ORIGEM</label>
                            <input type="text" class="form-control" value="<?= (isset($origem) && $origem <> "") ? $origem : '' ?>" name="origem" id="cep-origem" />
                        </div>

                        <div class="form-group col-md-3">
                            <label>CEP DESTINO</label>
                            <input type="text" class="form-control" value="<?= (isset($destino) && $destino <> "") ? $destino : '' ?>" name="destino" id="cep-destino" />
                        </div>

                        <div class="form-group col-md-3">
                            <label>PESO EM KG</label>
                            <input type="text" class="form-control"  value="<?= (isset($peso) && $peso <> "") ? $peso : '' ?>" name="peso" id="peso" />
                        </div>

                        <div class="form-group col-md-4">
                            <label>ALTURA</label>
                            <input type="text" class="form-control"  value="<?= (isset($altura) && $altura <> "") ? $altura : '' ?>" name="altura" id="peso" />
                        </div>

                        <div class="form-group col-md-4">
                            <label>LARGURA</label>
                            <input type="text" class="form-control"  value="<?= (isset($largura) && $largura <> "") ? $largura : '' ?>" name="largura" id="peso" />
                        </div>

                        <div class="form-group col-md-4">
                            <label>COMPRIMENTO</label>
                            <input type="text" class="form-control"  value="<?= (isset($comprimento) && $comprimento <> "") ? $comprimento : '' ?>" name="comprimento" id="peso" />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success col-md-offset-3 col-md-6">Calcular Frete</button>
                        </div>
                    </div>
            </form>

            <div>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    echo "VALOR: " . $_resultado['valor'];
                    echo "<br>";
                    echo "PRAZO: " . $_resultado['prazo'];
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>