<?php
    $fullList = file('quotes.csv');
    $fullListCSV = str_getcsv($fullList);

    $n = $_GET['n'];
    
    $quotes = [];
    for($i = 0; $i <= $n; $i++){
        $quotes = [
            'author' => $fullListCSV[i][0],
            'quote' => $fullListCSV[i][1]
        ];
    }

    echo json_encode($quotes);
?>