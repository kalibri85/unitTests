<?php
namespace App\Service;

class NumberFormatter
{
    const FORMAT_M = 'M';
    const FORMAT_K = 'K';
    const PRECISION = 2;

    public function convert(float $number):string
    {
        $positiveNumber = abs($number);

        if(($positiveNumber >= 0) && ($positiveNumber < 1000)){
                $result = ((round($positiveNumber) == round($positiveNumber, self::PRECISION)) ? number_format($positiveNumber, '0', '.', ' ') : number_format($positiveNumber, self::PRECISION));
        }elseif (($positiveNumber >= 1000) && ($positiveNumber < 99950)){
            $result = number_format( $positiveNumber, 0, '.', ' ' );
        }elseif(($positiveNumber >= 99950) && ($positiveNumber < 999500)){
           $result = round($positiveNumber, -3)/1000;
           $result =$result.self::FORMAT_K;
        }elseif(($positiveNumber >= 999500) or ($positiveNumber <= -999500)){
            $result = number_format($positiveNumber/1000000, self::PRECISION);
            $result =$result.self::FORMAT_M;
        }

        return (($number < 0) ? '-'.$result : $result);
    }

}


