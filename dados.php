<?php

require_once("funcoes.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simplex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100%;
            background-image: url('back.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="">
        <div class="col-md-12 mx-auto card text-center">

            <div class="container ">

                <?php

                $vet = array();
                $vet_novo = array();
           
                $qtd_x = $_GET["qtd_x"];
                $qtd_f = $_GET["qtd_f"];

                $total = $qtd_x + $qtd_f;
                $total += 1;

                $qtd_f += 1;
                $i = 0;
                $index = 0;

                while ($i < $qtd_f) {

                    if ($i == 0) {
                        $index++;
                    } else {
                        $index = 0;
                    }

                    echo "<div class='row mx-auto text-center'>";

                    echo " <h6 class='col-md-1'> $index </h6>";

                    $k = 1;
                    $vet[$i][$k - 1] = $index;

                    while ($k <= $total) {
                        $valor = $_GET['f' . $i . 'x' . $k];

                        if ($i == 0) {
                            $valor = $valor * -1;
                        }

                        if ($valor != "") {
                            echo " <h6 class='col-md-1'> $valor </h6>";

                            $vet[$i][$k] = $valor;
                        } else {
                            if ($k == $total) {
                                echo " <h6 class='col-md-1'> " . $_GET['f' . $i . 'res'] . " </h6>";

                                $vet[$i][$k] = $_GET['f' . $i . 'res'];
                            } else {
                                if ($i == ($k - ($qtd_x))) {
                                    echo " <h6 class='col-md-1'> 1 </h6>";
                                    $vet[$i][$k] = 1;
                                } else {
                                    echo " <h6 class='col-md-1'> 0 </h6>";
                                    $vet[$i][$k] = 0;
                                }
                            }
                        }
                        $k++;
                    }
                    echo "</div>";
                    $i++;
                }
                $i = 0;

                $qtd_linhas = count($vet);
                $qtd_colunas = count($vet[0]);
                echo "<br><br>---------------- PRIMEIRA ETAPA ------------------<br><br>";

                $vet_novo = resolver($qtd_colunas, $qtd_linhas, $vet);

                while (min($vet_novo[0]) < 0) {
                    $vet_novo = resolver($qtd_colunas, $qtd_linhas, $vet_novo);
                }

                echo "<br><br><br>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>