
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light head">
        <span class="navbar-brand mb-0 h1">Catálogo de heróis</span>
    </nav>
    <div class="container">
        <div class="row row-cols-md-5">
            <?php
            $i = 10;
            for ($i; $i < 730; $i = $i + 30) {
                $url = "https://superheroapi.com/api/3456617874455211/$i";
                $heros = json_decode(file_get_contents($url));
            ?>
                <div class="card">
                    <div class="col ">
                        <img src="<?= $heros->image->url ?>" alt="">
                        <div class="inf">
                            <p><?= $heros->name ?></p>
                            <p>powerstats: </p>
                            <div class="stats">
                                <lu>
                                    <li>intelligence: <?= $heros->powerstats->intelligence ?></li>
                                    <li>strength: <?= $heros->powerstats->strength ?></li>
                                    <li>speed: <?= $heros->powerstats->speed ?></li>
                                    <li>durability: <?= $heros->powerstats->durability ?></li>
                                    <li>power: <?= $heros->powerstats->power ?></li>
                                    <li>combat: <?= $heros->powerstats->combat ?></li>
                                </lu>
                            </div>
                        </div>


                    </div>
                    <button class="btn-save">Inserir heroi no banco
                        <?php
                        $connection = pg_connect("port=5432 dbname=heros user= password=");

                        if ($connection) {
                            $sql = "INSERT INTO herois (id, nome, img_url, intelligence, strength, speed, durabi, pwr, combat) 
               VALUES (1, 'Fábio')";
                            pg_query($conn, $sql);
                            echo "++ Heroi inserido com sucesso!!";
                            pg_close($conn);
                        } else {
                            echo "++ Falha de conexao!!";
                        }
                        ?>
                    </button>
                </div>
            <?php } ?>

        </div>
    </div>
</body>

</html>