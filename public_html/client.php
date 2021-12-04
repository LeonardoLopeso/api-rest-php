<?php

    $url = 'http://localhost/api-rest-php/public_html/api';

    $class = '/user';
    $param = '';

    $response = file_get_contents($url.$class.$param);

    
    $response = json_decode($response, 1);

    echo '<pre>';
    var_dump($response);
    echo '</pre>'; 


