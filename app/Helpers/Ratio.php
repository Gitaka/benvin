<?php
namespace App\Helpers;

class Ratio{
	public static function gcd($a,$b){
      return $b ? Ratio::gcd($b, $a % $b): $a;
	}
	public static function getGcd($array){
      $gcd = Ratio::gcd($array[0],$array[1]);
      for($i = 2; $i < count($array); $i++){
      	$gcd = Ratio::gcd($gcd,$array[$i]);
      }

      return $gcd;
	}
}

?>