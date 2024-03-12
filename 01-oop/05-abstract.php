<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04- Inheritance</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            }
        }

        .zoom-container {
            transition: transform 0.3s;
            /* Agrega una transición suave al efecto de zoom */
        }

        .zoom-container:hover {
            transform: scale(1.01);
            /* Ajusta el valor para aumentar o disminuir el nivel de zoom */
        }

        img {
            max-width: 50px;
        }

        table {
            border-collapse: collapse;
            width: 100%;

            thead {
                color: black;
                background-color: #ffffff;
            
            }

            tbody {
                color: #ffffff;
            }

            td,
            th {
                padding: 10px;
                text-align: left;
            }

            /* Intercale entre columnas gris y negro */
            tbody tr:nth-child(even) {
                background-color: rgba(0, 0, 0, 0.5);
                /* fondo negro con transparencia para filas pares */
            }

            tbody tr:nth-child(odd) {
                background-color: rgba(102, 102, 102, 0.5);
                /* fondo gris con transparencia para filas impares */
            }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM231 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L376 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-182.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L119 273c-9.4-9.4-9.4-24.6 0-33.9L231 127z" />
            </svg>
        </a>
    </nav>

    <main>
        <h2>05 - Abstract</h2>

        <section>
            <?php
            abstract class Database
            {
                //atributos
                protected $host;
                protected $user;
                protected $pass;
                protected $dbname;
                protected $conx;

                //Metodos
                public function __construct($dbname, $host = 'localhost', $user = 'root', $pass = "")
                {
                    $this->host = $host;
                    $this->user = $user;
                    $this->pass = $pass;
                    $this->dbname = $dbname;
                }

                public function connect()
                {
                    try {
                        $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
                        echo '😊';
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }

            class Digimon extends Database
            {
                public function listPokemons()
                {
                    $lisDigimons = $this->conx->query('SELECT * FROM pokemons');
                    return $lisDigimons->fetchALL();
                }
            }

            $db = new Digimon('adso2613934');
            $db->connect();
            $listDigimons = $db->listPokemons();
            ?>
        </section>

        <section>
            <table>
                <thead>
                    <td>id</td>
                    <td>nambre</td>
                    <td>tipo</td>
                    <td>Salud</td>
                    <td>imagen</td>

                </thead>
                <tbody>
                    <?php foreach ($listDigimons as $digimon) :  ?>
                        <tr>
                            <td><?= $digimon['id'] ?></td>
                            <td><?= $digimon['name'] ?></td>
                            <td><?= $digimon['type'] ?></td>
                            <td><?= $digimon['health'] ?></td>
                            <td><img src="images/<?= $digimon['image'] ?>" alt=""></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

    </main>


</body>
</body>

</html>