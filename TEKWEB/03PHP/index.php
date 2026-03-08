<?php
    //legge la directory galleria e salva i nomi dei file in un array
    $files = scandir("../galleria");
    $files = array_diff($files, array('.', '..')); //rimuove i file . e .. dalla lista
    $files = array_values($files); //reindicizza l'array dopo aver rimosso i file . e .. 
    $n=count($files);
    if (isset($_GET["indice"])) {
        $indice = (int)$_GET["indice"];    //TODO: inserire controllo sul tipo (intero )
    } else {
        $indice = 0;
    }

    
    function indice( $direzione ){  
        global $indice,$n;
        return ($indice + $direzione + $n ) % $n;

    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gall 03</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">


                <a class="navbar-brand" href="#">
                    Il mio sito
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">
                        Home
                    </a></li>
                    <li class="nav-item"><a class="nav-link " href="#">
                        Chi siamo
                    </a></li>
                    <li class="nav-item"><a class="nav-link " href="#">
                        Contatti
                    </a></li>
                </ul>
            </div>    
        </nav>
    </header>

    <main class="container my-4">
        <h2 class="mb-3">
            Benvenuto!
        </h2>
        <p class="lead">
            Home page del mio sito

        </p>

        <div>
            <a href="?indice=<?=indice(-1) ?>">  <img src=../img/sx.png> </a>
            <img src="../galleria/<?=$files[$indice]?>">
             <a href="?indice=<?=indice(+1) ?>">  <img src=../img/dx.png> </a>
           
            
        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <p class="mb-0">
            &copy; 2025 - Sito esempio con Bootstrap
        </p>
    </footer>

</body>
</html>