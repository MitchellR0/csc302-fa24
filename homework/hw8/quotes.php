<?php

    $fullList = file('quotes.csv');
    $fullListCSV = [];

    foreach ($fullList as $line){
        array_push($fullListCSV, str_getcsv($line));
    }

    $n = $_GET['n'];
    
    $quotes = [];
    for($i = 1; $i <= $n; $i++){
        $quotes[] = [
            'author' => $fullListCSV[$i][0],
            'quote' => $fullListCSV[$i][1]
        ];
    }

    echo json_encode($quotes);
?>