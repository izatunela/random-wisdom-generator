<?php

namespace App;

class QuotesController
{
    /**
     * @var bool|string
     */
    private $fileJsonContent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fileJsonContent = $this->readFile();
    }

    /**
     * @return bool|string
     */
    public function fetchRandomQuote()
    {
        $allQuotes = json_decode($this->fileJsonContent,1);
        $randomKey = array_rand($allQuotes['quotes'],1);
        $quote = $allQuotes['quotes'][$randomKey];

        return json_encode($quote);
    }

    /**
     * @return bool|string
     */
    private function readFile()
    {
        return file_get_contents(__DIR__.'/quotes.json');
    }
}