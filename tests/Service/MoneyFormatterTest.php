<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\NumberFormatter;
use App\Service\MoneyFormatter;

class MoneyFormatterTest extends TestCase
{
    public function testConvertMoneyEur()
    {
        $converter =$this->createMock(NumberFormatter::class);
        $converter->expects($this->once())
            ->method('convert')
            ->with(2835779)
            ->willReturn('2.84M');

        $money = new MoneyFormatter($converter);
        $value = $money -> formatEur(2835779);
        $this->assertEquals('2.84M €', $value);

    }

    public function testConvertMoneyUsd()
    {
        $converter =$this->createMock(NumberFormatter::class);
        $converter->expects($this->once())
            ->method('convert')
            ->with(211.99)
            ->willReturn('211.99');

        $money = new MoneyFormatter($converter);
        $value = $money -> formatUsd(211.99);
        $this->assertEquals('$211.99', $value);
    }

}