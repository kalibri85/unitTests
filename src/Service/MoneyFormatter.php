<?php
namespace App\Service;

class MoneyFormatter
{
    const EUR = '€';
    const USD = '$';

    private $formatter;

    public function __construct(NumberFormatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function formatEur(float $number):string
    {
        return $this->formatter->convert($number).' '.self::EUR;
    }

    public function formatUsd(float $number):string
    {
        return self::USD.$this->formatter->convert($number);
    }
}