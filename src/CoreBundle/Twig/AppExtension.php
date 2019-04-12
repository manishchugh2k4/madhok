<?php

namespace CoreBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use \DateTime;
use \DateTimeZone;

class AppExtension extends \Twig_Extension
{
    private $timeZoner;
    private $container;
    protected $requestStack;
   
	
    public function __construct(Container $container, RequestStack $requestStack) 
    {
        $this->container = $container;
        $this->requestStack = $requestStack;
    }
	
	public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('inwords', array($this, 'inwordsFilter'))
        );
    }
    
    public function inwordsFilter($amt)
    {
        $no = round($amt);
        $point = round($amt - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            '0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety'
        );
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $amt = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($amt) {
                $plural = (($counter = count($str)) && $amt > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($amt < 21) ? $words[$amt] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($amt / 10) * 10]
                    . " " . $words[$amt % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }

        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
                    "." . $words[$point / 10] . " " . 
        $words[$point = $point % 10] : '';
        
        $result .= "Rupees";
        if ($points) {
            
            $result .= " " . $points . " Paise";
        }
        
        return ucfirst($result);
    }
}
