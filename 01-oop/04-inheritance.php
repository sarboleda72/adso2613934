<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04- Inheritance</title>
    <link rel="stylesheet" href="css/master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        <section>
            <?php
            class Pokemon
            {
                // Attributes
                protected $name;
                protected $type;
                protected $healt;
                protected $img;
                //protected $image;


                // Methods
                public function __construct($name, $type, $healt, $img)
                {
                    $this->name  = $name;
                    $this->type  = $type;
                    $this->healt = $healt;
                    $this->img = $img;
                }
                public function attack()
                {
                    return "Attack";
                }
                public function defense()
                {
                    return "Defense";
                }
                public function show()
                {
                    return array('name' => $this->name, 'type' => $this->type, 'healt' => $this->healt, 'img' => $this->img);
                }
            }

            class Evolve extends Pokemon
            {
                public function levelUp($name, $type, $healt, $img)
                {
                    $this->name  = $name;
                    $this->type  = $type;
                    $this->healt = $healt;
                    $this->img = $img;
                }
            }

            $pk = new Evolve('Nyokimon', 'Fire', 150, 'images/nyokimon.png');
            $showNyo = $pk->show();
            $pk->levelUp('Bubbmon', 'Fire', 250, 'images/bubbmon.png');
            $showBub = $pk->show();
            $pk->levelUp('Piyomon', 'Fire-Fly', 450, 'images/piyomon.png');
            $showPiy = $pk->show();
            ?>
            <h2>Evolve your Pokemon</h2>


        </section>
        <div class="container w-50 bg-black  bg-opacity-50 rounded-5 p-5 mt-2">
            <h1 class="text-center">04- Inheritance</h1>
            <div class="row text-center mt-5">
                <div class="col bg-primary mx-2 border border-white border-2 ">
                    <img src="<?php echo $showNyo['img']; ?>" alt="">
                </div>
                <div class="col bg-primary mx-2 border border-white border-2 ">
                    <img src="<?php echo $showBub['img']; ?>" alt="">
                </div>
                <div class="col bg-primary mx-2 border border-white border-2 ">
                    <img src="<?php echo $showPiy['img']; ?>" alt="">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col bg-primary rounded-5 mx-2 d-flex justify-content-center p-3 border border-white border-2 ">
                    <ul class="list-unstyled">
                        <li>Nombre: <?php echo $showNyo['name']; ?></li>
                        <li>Tipo: <?php echo $showNyo['type']; ?></li>
                        <li>Salud: <?php echo $showNyo['healt']; ?></li>
                    </ul>

                </div>
                <div class="col bg-primary rounded-5 mx-2 d-flex justify-content-center p-3 border-danger border border-white border-2 ">
                    <ul class="list-unstyled">
                        <li>Nombre: <?php echo $showBub['name']; ?></li>
                        <li>Tipo: <?php echo $showBub['type']; ?></li>
                        <li>Salud: <?php echo $showBub['healt']; ?></li>
                                                
                    </ul>

                </div>
                <div class="col bg-primary rounded-5 mx-2 d-flex justify-content-center p-3 border border-white border-2 ">
                    <ul class="list-unstyled">
                        <li>Nombre: <?php echo $showPiy['name']; ?></li>
                        <li>Tipo: <?php echo $showPiy['type']; ?></li>
                        <li>Salud: <?php echo $showPiy['healt']; ?></li>
                    </ul class="list-unstyled">
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>

</html>