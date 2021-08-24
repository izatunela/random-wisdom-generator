<?php

namespace App;

class QuotesController
{
    public function __construct()
    {
    }

    /**
     * @return bool|string
     */
    public function fetchQuote()
    {
        $file = $this->readQuotesFile();
        $quotes = json_decode($file);
        $totalQuotes = count($quotes->quotes);
        $randomQuote = mt_rand(0,$totalQuotes-1);

        $quote = $quotes->quotes[$randomQuote];

        return json_encode($quote);
    }

    /**
     * @return bool|string
     */
    public function readQuotesFile()
    {
        return file_get_contents(__DIR__.'/quotes.json');
    }
}