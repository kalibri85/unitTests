<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Service\NumberFormatter;

class NumberFormatterTest extends TestCase
{
    public function getConvertData()
    {
        return
            [
                ['0', '0'],
                ['12.00', '12'],
                ['533.1', '533.10'],
                ['999.99', '999.99'],
                ['999.00', '999'],
                ['99.999', '100'],
                ['999.9999', '1 000'],
                ['27533.78', '27 534'],
                ['535216', '535K'],
                ['535216.225', '535K'],
                ['535216.999', '535K'],
                ['99950', '100K'],
                ['999499', '999K'],
                ['2835779', '2.84M'],
                ['999500', '1.00M'],
                ['-14.00', '-14'],
                ['-533.1', '-533.10'],
                ['-999.99', '-999.99'],
                ['-999.9999', '-1 000'],
                ['-27533.78', '-27 534'],
                ['-535216', '-535K'],
                ['-99950', '-100K'],
                ['-999499', '-999K'],
                ['-2835779', '-2.84M'],
                ['-999500', '-1.00M'],
            ];
    }

    /**
     * @param $number
     * @param $expected
     * @dataProvider getConvertData
     */
    public function testConvertNumber($number, $expected){
        $converter = new NumberFormatter();
        $value = $converter -> convert($number);
        $this->assertEquals($expected, $value);
    }

}