<?php
    //legge la directory galleria e salva i nomi dei file in un array
    $files = scandir("../galleria");
    $files = array_diff($files, array('.', '..')); //rimuove i file . e .. dalla lista
    $files = array_values($files); //reindicizza l'array dopo aver rimosso i file . e .. 
    $n=count($files);
    
    $indice = (int)$_GET["indice"];  //TODO: inserire controllo su parametro
    $indice = indice(-1);

    header("content-type: text/text");

    echo '<img id="galleria" data-index="'.$indice.'" src=../galleria/'. $files[$indice].'>';



    function indice( $direzione ){  
        global $indice,$n;
        return ($indice + $direzione + $n ) % $n;

    }
?>