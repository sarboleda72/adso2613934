<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03- Visibility</title>
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

            form {
                border: 2px solid #fff6;
                background-color: #fff3;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                padding: 10px;
                width: 300px;

                label {
                    display: flex;
                    justify-content: space-between;
                    gap: 1.4rem;
                }

                output {
                    font-size: 1.4rem;
                }

                button {
                    background-color: #994bde;
                    border: 2px solid #fff6;
                    border-radius: 8px;
                    color: #fff9;
                    cursor: pointer;
                    font-size: 1rem;
                    width: 300px;
                    padding: 1rem;
                }

            }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path fill="#ffffff"
            d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM231 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L376 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-182.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L119 273c-9.4-9.4-9.4-24.6 0-33.9L231 127z" />
        </svg>
    </a>
</nav>
<main>
    <h1>04 - Inheritance</h1>
    <section>
        <?php
            class Pokemon {
                // Attributes
                protected $name;
                protected $type;
                protected $healt;

                // Methods
                public  function __construct($name, $type,$healt) {
                    $this->name = $name;
                    $this->type = $type;
                    $this->healt = $healt;
                }

                protected function attack(){
                    return "Attack";
                }
                
                protected function defense(){
                    return "Defense";
                }                

            }

            class Charmander extends Pokemon {
                public function evolve(){
                    return 'Charmeleon';
                }
            }

            $pk = new Charmander();
            $pk->xyz();

        ?>
            <h2>Evolve your Pokemon</h2>
                        
            
            
        </section>
    </main>
</body>

</html>