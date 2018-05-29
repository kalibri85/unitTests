<?php

namespace App\Controller;

use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index()
    {
        $number = 2835779;
        //$dative = $this->get(NumberFormatter::class)->convert($number);
        $dative = $this->get(MoneyFormatter::class)->formatEur($number);
        return new Response($number . ' => ' . $dative);
    }
}
