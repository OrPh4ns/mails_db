<?php
namespace app\Modules;
class Helpers
{
    public static function randomGenerator(int $count): string
    {
        $generated_code  = "";
        for($i = 0; $i < $count; $i++) {$generated_code .= mt_rand(0, 9);}
        return $generated_code;
    }
}