<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
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
    <br><br><br>
    <div class="col-md-3 mx-auto align-self-center card">
        <div class="card-body">
            <form action="gerar.php" method="POST">
                <label>Quantidade de variáveis:</label> 
                <input type="number" name="qtd_x" class="form-control">
                <br>
                <label>Quantidade de restrições: </label>
                <input type="number" name="qtd_f" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary form-control">Gerar</button>
            </form>
        </div>
    </div>
</body>
</html>