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
        body
        {
            height: 100%;
            background-image: url('back.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>

    <div class="col-md-12 mx-auto">
    <div class="container card">
    <br>
    
    <form action="dados.php" method="GET">
        
        <div class="row">
            
               <?php
                    $qtd_x = $_GET["qtd_x"];
                    $qtd_f = $_GET["qtd_f"];

                    echo "<input type='hidden' name='qtd_x' value='$qtd_x'>\n";
                    echo "<input type='hidden' name='qtd_f' value='$qtd_f'>";

                    $i = 0;
                    while($i <= $qtd_f) {

                        $var_name = "F$i";
                        
                        if($i == 0) {
                            $var_name = "Z";
                        }
                        
                        echo "<div class='col-md-3 card  mx-auto'>
                                <div>
                                <br>
                                <p class='text-center'><b>Insira os valores de X para ".$var_name." </b></p>";
                                    
                                $k = 1;
                                while ($k <= $qtd_x) {
                                    echo "<div class='col-md-12 row'>
                                            <div class='col-md-6 text-center'>
                                                X$k:
                                            </div>
                                            <div class='col-md-6'>
                                                <input type='number' name='f".$i."x".$k."' class='form-control' step='0.001'>
                                            </div>
                                    </div>";
                                    $k++;
                                }
                                echo "<div class='col-md-12 row'>
                                        <div class='col-md-6 text-center'>
                                            <b>Res:</b>
                                        </div>
                                        <div class='col-md-6'>
                                            <input type='number' name='f".$i."res' class='form-control' step='0.001' value='0'>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                            </div>";
                                $i++;
                            }

                ?>
                
                </div>
                <br>
                <button type="submit" class="btn btn-success form-control">Calcular</button>
                <br><br>
            </form>
        </div>
    </div>

</body>
</html>