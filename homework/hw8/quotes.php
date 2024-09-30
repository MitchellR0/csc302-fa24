<?php

    $fullList = file('quotes.csv');
    $fullListCSV = [];

    foreach ($fullList as $line){
        $fullListCSV[] = str_getcsv($line);
    }

    $n = $_GET['n'];
    
    $quotes = [];
    for($i = 1; $i <= $n; $i++){
        $randomQuote = random_int(0, count($fullListCSV));
        $quotes[] = [
            'author' => $fullListCSV[$randomQuote][0],
            'quote' => $fullListCSV[$randomQuote][1]
        ];
    }

    echo json_encode($quotes);
?>