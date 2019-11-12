<?php

function gerar_nlp($pivo, $vet, $qtd_colunas, $linha_menor_valor)
{
    $nlp = array();
    $i = 0;

    while ($i < $qtd_colunas) {
        $val = "";
        if ($pivo == 0) {
            $val = $vet[$linha_menor_valor][$i];
        } else {
            $val = $vet[$linha_menor_valor][$i] / $pivo;
        }
        $nlp[$i] = $val;
        $i++;
    }
    return $nlp;
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
            $valorColuna = 0.0000000000;
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

    echo "Menor valor = $menor_valor <br>";

    $pivo = $vet[$linha_menor_valor][$coluna];

    echo "<br><br>---------------- SEGUNDA ETAPA ------------------<br><br>";

    $i = 0;
    echo "<b>Linha Pivô:</b> &nbsp";

    while ($i < $qtd_colunas) {
        $val = $vet[$linha_menor_valor][$i];
        echo number_format($val, 3, ",", ".") . " &nbsp&nbsp&nbsp&nbsp  ";
        $i++;
    }

    echo "<br>";
    echo "<b>Nova Linha Pivô:</b> &nbsp";

    $novaLinhaPivo = array();
    $i = 0;

    while ($i < $qtd_colunas) {

        $val = "";

        $val = $vet[$linha_menor_valor][$i] / $pivo;

        $novaLinhaPivo[$i] = $val;
        echo number_format($val, 3, ",", ".") . " &nbsp&nbsp&nbsp&nbsp  ";
        $i++;
    }

    echo "<br>";
    $i = 0;
    while ($i < $qtd_linhas) {

        if ($i != $linha_menor_valor) {

            $k = 0;
            $nlp = gerar_nlp($pivo, $vet, $qtd_colunas, $linha_menor_valor);

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
        echo "<b><u>" . ($i + 1) . "ª</b></u> :";

        for ($j = 0; $j < $qtd_colunas; $j++) {
            echo number_format($vet_novo[$i][$j], 3) . " &nbsp&nbsp&nbsp&nbsp  ";
        }
        echo "<br>";
    }

    $i = 0;
    $k = 0;

    return $vet_novo;
}
