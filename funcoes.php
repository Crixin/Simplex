<?php

function calculaVarBases($vetor)
{
    
    $qtd_linhas = count($vetor);
    $qtd_colunas = count($vetor[0]);
    for ($i = 1; $i < $qtd_colunas -1; $i++){
        $countUm = 0;
        $countZero = 0;
        $countOutro = 0;
        $valor = 0;

        for ($j = 1; $j < $qtd_linhas; $j++){
            if($vetor[$j][$i] == 0){
                $countZero++;
            }elseif($vetor[$j][$i] == 1){
                $valor = $j;
                $countUm++;
            }else{
                $countOutro++;
            }
        }
        if($countUm == 1 && $countOutro == 0){
            $resposta["base"][$i] = $valor; 
        }else{
            $resposta["nao_base"][$i] = 0; 
        }

    }
    return $resposta;
}

function tituloVarBase($qtd_f)
{
    $retorno = array();
    $k = 1;
    for ($i = 1; $i < $qtd_f -1; $i++) {
        $retorno[$k] = "X" . $i;
        $k++;
    }
    
    for ($i = 1; $i < $qtd_f; $i++) {
        $retorno[$k] = "xF" . $i;
        $k++;
    }

    return $retorno;
}

function montaCabecalho($qtd_f)
{
    $contLabel = 0;
    $name = "Z";
    while ($contLabel < $qtd_f - 1) {
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
}

function resolver($qtd_colunas, $qtd_linhas, $vet)
{
    $vet_novo = array();
    $coluna = array_search(min($vet[0]), $vet[0]);

    $i = 1;

    $menor_valor = 0;
    $linha_menor_valor = 1;
    $pivo = 0;

    // PEGA A LINHA COM O MENOR VALOR E O MENOR VALOR
    while ($i < $qtd_linhas) {

        $b = $vet[$i][count($vet[0]) - 1];
        $val = 0;
        $valorColuna = $vet[$i][$coluna];

        if ($valorColuna < 0) {
            $valorColuna = 0.000000;
        }

        if ($valorColuna == 0) {
            $val = $valorColuna;
        } else {
            $val = $b / $valorColuna;
        }

        if ($menor_valor == 0) {
            $menor_valor = $val;
        }

        if ($val < $menor_valor && $val > 0) {
            $menor_valor = $val;
            $linha_menor_valor = $i;
        }

        $i++;
    }
    $pivo = $vet[$linha_menor_valor][$coluna];
    ?>
    <br>
    <!-- table pivo -->
    <table class="table table-bordered">
        <thead class="thead-dark">
            <td>Elemento pivô: <?= $pivo ?> (Linha: <?=$linha_menor_valor+1?> e Coluna: <?=$coluna+1?>) </td>
            <?php montaCabecalho($qtd_linhas); ?>
        </thead>
        <tbody>
            <tr>
                <td>Linha pivô</td>
                <?php
                    $i = 0;
                    while ($i < $qtd_colunas) {
                        $val = $vet[$linha_menor_valor][$i];
                        echo "<td>" . number_format($val, 3, ",", ".") . " </td> ";
                        $i++;
                    } 
                ?>
            </tr>
            <tr>
                <td>Nova linha pivô</td>
                <?php
                    $novaLinhaPivo = array();
                    $i = 0;
                    while ($i < $qtd_colunas) {
                        $val = "";
                        $val = $vet[$linha_menor_valor][$i] / $pivo;
                        $novaLinhaPivo[$i] = $val;
                        echo "<td>" . number_format($val, 3, ",", ".") . " </td>  ";
                        $i++;
                    }
                ?>
            </tr>
        </tbody>
    </table>
    <?php

    $i = 0;
    //calculando a nova tabela 
    while ($i < $qtd_linhas) {
        if ($i != $linha_menor_valor) {
            $k = 0;
            $nlp = $novaLinhaPivo;
            while ($k < $qtd_colunas) {
                $valor = $vet[$i][$coluna] * -1;

                $val = $nlp[$k] * $valor;

                $val2 = $val + $vet[$i][$k];

                $vet_novo[$i][$k] = $val2;
                $k++;
            }
            echo "<br>";
        } else {
            $k = 0;
            while ($k < $qtd_colunas) {
                $val = $novaLinhaPivo[$k];
                $vet_novo[$i][$k] = $val;
                $k++;
            }
        }
        $i++;
    }

    $i = 0;

    for ($i = 0; $i < $qtd_linhas; $i++) {
        if($linha_menor_valor != $i){ ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <td></td>
                    <?php montaCabecalho($qtd_linhas); ?>
                </thead>
                <tbody>
                    <tr>
                        <td>NLP</td>
                        <?php
                            $novaLinhaPivo = array();
                            $iterator = 0;
                            while ($iterator < $qtd_colunas) {
                                $val = "";
                                $val = $vet[$linha_menor_valor][$iterator] / $pivo;
                                $novaLinhaPivo[$iterator] = $val;
                                echo "<td>" . number_format($val, 3, ",", ".") . " </td>  ";
                                $iterator++;
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><?= $i + 1 ?>ª L</td>
                        <?php 
                            for ($j = 0; $j < $qtd_colunas; $j++) {
                                echo "<td>" . number_format($vet[$i][$j], 3) . " </td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td><?= $i + 1 ?>ª NL</td>
                        <?php 
                            for ($j = 0; $j < $qtd_colunas; $j++) {
                                echo "<td>" . number_format($vet_novo[$i][$j], 3) . " </td>";
                            }
                        ?>
                    </tr>
                </tbody>
            </table>

    <?php
        }
    }
    ?>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <?php montaCabecalho($qtd_linhas); ?>
        </thead>
        <tbody>
            <?php 
            for ($i = 0; $i < $qtd_linhas; $i++) {
                echo '<tr>';
                for ($j = 0; $j < $qtd_colunas; $j++) {
                    echo "<td>" . number_format($vet_novo[$i][$j], 3) . " </td>";
                }
                echo '</tr>';
            }?>
        </tbody>
    </table>

<?php
    
    $titulos = tituloVarBase($qtd_linhas);
    
    $valoresBases = calculaVarBases($vet_novo);
    
?>
    <div class="col-md-12 row">
    <table class="table table-bordered mr-3 " style="width:200px ">
        <thead class="thead-dark">
            <tr>
                <th>Variáveis básicas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                   foreach ($valoresBases['base'] as $key => $value) {
                       //print_r();
                       //print_r($vet_novo[$value][$qtd_linhas+$qtd_linhas-2]);
                       echo "<tr><td>".$titulos[$key]." = ". $vet_novo[$value][$qtd_linhas+$qtd_linhas-2]  . "</td></tr>";
                    }
                ?>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered mr-3" style="width:200px ">
        <thead class="thead-dark">
            <tr>
                <th>Variáveis não básicas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                   foreach ($valoresBases['nao_base'] as $key => $value) {
                       //print_r();
                       //print_r($vet_novo[$value][$qtd_linhas+$qtd_linhas-2]);
                       echo "<tr><td>".$titulos[$key]." = 0</td></tr>";
                    }
                ?>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered mr-3" style="width:200px ">
        <thead class="thead-dark">
            <tr>
                <th>Valor de Z</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    echo "<tr><td>".$vet_novo[0][$qtd_linhas+$qtd_linhas-2]."</td></tr>";
                ?>
            </tr>
        </tbody>
    </table>
    </div>


<?php
    $i = 0;
    $k = 0;
/*     print_r("<pre>");
    print_r($vet_novo);
    print_r("</pre>");
    exit(); */
    return $vet_novo;
}
