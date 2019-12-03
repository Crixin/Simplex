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

    <div class="col-md-12 mx-auto">
        <br><br><br>
        <div class="container card">

            <form action="montaTabela.php" method="POST">

                <div class="row card">

                    <?php
                    $qtdVar = $_POST["qtdVar"];
                    $qtdRes = $_POST["qtdRes"];

                    echo "<input type='hidden' name='qtdVar' value='$qtdVar'>\n";
                    echo "<input type='hidden' name='qtdRes' value='$qtdRes'>";

                    $i = 0;
                    while ($i <= $qtdRes) {
                        $var_name = " a $i ª restrição:";

                        if ($i == 0) {
                            $var_name = "a função objetivo:";
                        }

                        echo "
                        <div class='col-md-12' style='vertical-align:middle'>
                            <br>
                            <p class='text-left'><b>Insira os valores para " . $var_name . " </b></p>
                            <div class='input-group'>";

                            $k = 1;
                            while ($k <= $qtdVar) {
                                echo "<label class='mr-2 ml-2'>X$k:</label><input type='number' name='f" . $i . "x" . $k . "' class='form-control col-md-2' step='0.001'>";
                                $k++;
                            }

                            echo "
                            <b class='mr-2 ml-2'> <= </b> <input type='number' name='f" . $i . "res' class='form-control col-md-2' step='0.001' value='0'>
                            </div>
                        </div><br>";
                        $i++;
                    }

                    ?>

                </div>
                <button type="submit" class="btn btn-success form-control footer">Calcular</button>
                <br><br>
            </form>
        </div>
    </div>

</body>

</html>