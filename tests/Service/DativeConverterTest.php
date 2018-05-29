<?php
namespace App\Test\Service;

use App\Service\DativeConverter;
use PHPUnit\Framework\TestCase;

Class DativeConverterTest extends TestCase {

    public function getConvertData()
    {
        return
        [
        ['Oleg', 'Oleg'],
        ['Jurgis', 'Jurgiui'],
        ['Kastytis', 'Kastičiui']
        ];
    }

    /**
     * @param $name
     * @param $expected
     * @dataProvider getConvertData
     */
    public function testConvertOleg($name, $expected){
        $converter = new DativeConverter();
       $value = $converter -> convert('Oleg');
       $this->assertEquals('Oleg', $value);
    }
    public function testConvertJurgis(){
        $converter = new DativeConverter();
        $value = $converter -> convert('Jurgis');
        $this->assertEquals('Jurgiui', $value);
    }
    public function testConvertKastytis(){
        $converter = new DativeConverter();
        $value = $converter -> convert('Kastytis');
        $this->assertEquals('Kastičiui', $value);
    }
}
