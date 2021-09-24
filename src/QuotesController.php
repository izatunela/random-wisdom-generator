<?php

namespace App;

class QuotesController
{
    private const JSON_FLAGS = JSON_PRETTY_PRINT;
    /**
     * @var bool|string
     */
    private string|bool $fileJsonContent;
    /**
     * @var
     */
    private $quotes;
    /**
     * @var int
     */
    private int $totalNumOfQuotes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fileJsonContent = $this->readFile();
        $this->quotes = json_decode($this->fileJsonContent)->quotes;
        $this->totalNumOfQuotes= count($this->quotes);
    }

    /**
     * @return bool|string
     */
    public function fetchRandomQuote()
    {
        $allQuotes = json_decode($this->fileJsonContent,1);
        $randomKey = array_rand($allQuotes['quotes'],1);
        $quote = $allQuotes['quotes'][$randomKey];

        return json_encode($quote,self::JSON_FLAGS);
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function fetchQuoteById($id)
    {
        return json_encode($this->quotes[$id-1] ?? new class{},self::JSON_FLAGS);
    }

    /**
     * @param int $id
     * @return false|string
     */
    public function fetchNextQuote($id = 0)
    {
        if ($id >= $this->totalNumOfQuotes)
            $id = 0;
        return json_encode($this->quotes[$id]);
    }

    // /**
    //  * @param $id
    //  * @return false|string
    //  */
    // public function fetchPreviousQuote($id)
    // {

    // }

    /**
     * @return bool|string
     */
    private function readFile()
    {
        return file_get_contents(__DIR__.'/quotes.json');
    }
}