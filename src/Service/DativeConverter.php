<?php
namespace App\Service;

class DativeConverter
{
    public function convert($name)
    {
        if((mb_substr($name, -2) === 'is') && (mb_substr($name, -4) != 'ytis')){
            return mb_substr($name, 0, -2).'iui';
        }
        if(mb_substr($name, -2) === 'us'){
            return mb_substr($name, 0, -2).'ui';
        }
        if(mb_substr($name, -4) === 'ytis'){
            return mb_substr($name, 0, -4).'ičiui';
        }
        return $name;
    }
}