<?php
    //legge la directory galleria e salva i nomi dei file in un array
    $files = scandir("../galleria");
    $files = array_diff($files, array('.', '..')); //rimuove i file . e .. dalla lista
    $files = array_values($files); //reindicizza l'array dopo aver rimosso i file . e .. 
    $n=count($files);

    echo "0 " . $files[0];

?>