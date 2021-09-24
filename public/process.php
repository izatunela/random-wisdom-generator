<?php
header('Content-Type: application/json');

require __DIR__ . '/../vendor/autoload.php';

use App\QuotesController;

$https = $_SERVER['HTTPS'] ?? null;
$host = $_SERVER['HTTP_HOST'];
$req_uri = $_SERVER['REQUEST_URI'];

$controller = new QuotesController;

if (isset($_GET['rand'])){
    echo $controller->fetchRandomQuote();
    return;
}
if (isset($_GET['next'])){
    echo $controller->fetchNextQuote($_GET['id']);
    return;
}
// if ($_GET['prev']){
//     echo $controller->fetchPreviousQuote($_GET['id']);
// }
// $url = ($https ? "https" : "http") . "://$host$req_uri";

if ($req_uri === '/quote/random') {
    echo $controller->fetchRandomQuote();
} else if(preg_match('/\/quote\/(\d+)/', $req_uri,$groups)){
    echo $controller->fetchQuoteById($groups[1]);
} else{
    echo json_encode(new stdClass, JSON_PRETTY_PRINT);
}