<?php
ini_set('display_errors',1);

require __DIR__ . '/../vendor/autoload.php';

use App\QuotesController;

$controller = new QuotesController;

if ($_GET['prev']){
    echo $controller->fetchPreviousQuote($_GET['id']);
}
else{
    echo $controller->fetchNextQuote($_GET['id']);
}
