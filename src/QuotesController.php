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
        $quotes = json_decode($file,1);
        $randomKey = array_rand($quotes['quotes'],1);
        $quote = $quotes['quotes'][$randomKey];

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