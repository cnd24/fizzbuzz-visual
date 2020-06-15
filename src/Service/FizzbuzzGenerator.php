<?php


namespace App\Service;


class FizzbuzzGenerator
{

    public function getFizzBuzz(int $n)
    {
        $tab = [];
        for($i=1; $i<=$n; $i++) {
            $i%3 == 0 && $i%5 == 0 ? array_push($tab, "FizzBuzz") : ($i%5 == 0 ?  array_push($tab, "Buzz") : ($i%3 == 0  ?  array_push($tab, "Fizz") :  array_push($tab, $i)));
        }
        return $tab;
    }
}
