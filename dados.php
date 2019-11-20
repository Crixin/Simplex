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
            background-image: url('fundo.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="">
        <br> <br> <br>
        <div class="col-md-8 mx-auto align-self-center card">
            <div class="card-body">
                <?php

                $vet = array();
                $vet_novo = array();

                $qtd_x = $_POST["qtd_x"];
                $qtd_f = $_POST["qtd_f"];

                $total = $qtd_x + $qtd_f;
                $total += 1;

                $qtd_f += 1;
                $i = 0;
                $index = 0; ?>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <?php
                            $contLabel = 0;
                            $name = "Z";
                            while ($contLabel < $qtd_f -1) {
                                echo '<th scope="col">' . $name . '</th>';
                                $contLabel++;
                                $name = "X" . $contLabel;
                            }
                            $contLabel = 1;
                            while ($contLabel < $qtd_f) {
                                $name = "xF" . $contLabel;
                                echo '<th scope="col">' . $name . '</th>';
                                $contLabel++;
                            }
                            echo '<th scope="col">b</th>';

                            ?>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($i < $qtd_f) {

                            if ($i == 0) {
                                $index = 1;
                            } else {
                                $index = 0;
                            }
                            ?>
                            <tr>
                                <?php
                                    echo " <td > $index </td>";

                                    $k = 1;
                                    $vet[$i][$k - 1] = $index;

                                    while ($k <= $total) {
                                        $valor = $_POST['f' . $i . 'x' . $k];

                                        if ($i == 0) {
                                            $valor = $valor * -1;
                                        }

                                        if ($valor != "") {
                                            echo " <td> $valor </td>";

                                            $vet[$i][$k] = $valor;
                                        } else {
                                            if ($k == $total) {
                                                echo " <td> " . $_POST['f' . $i . 'res'] . " </td>";

                                                $vet[$i][$k] = $_POST['f' . $i . 'res'];
                                            } else {
                                                if ($i == ($k - ($qtd_x))) {
                                                    echo " <td> 1 </td>";
                                                    $vet[$i][$k] = 1;
                                                } else {
                                                    echo " <td> 0 </td>";
                                                    $vet[$i][$k] = 0;
                                                }
                                            }
                                        }
                                        $k++;
                                    }
                                    echo "</div>";
                                    $i++;
                                ?>
                            </tr>
                        <?php
                        } ?>
                    </tbody>

                </table>

                <?php
                $i = 0;

                $qtd_linhas = count($vet);
                $qtd_colunas = count($vet[0]);

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