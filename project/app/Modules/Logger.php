<?php
namespace app\Modules;
use app\Core\Router;
class Logger{
    public static function logging(string $log): void
    {
        file_put_contents('amadeus.log', "\n$log", FILE_APPEND);
    }
    public static function error(string $log): void
    {
        file_put_contents('errors.log', "\n$log", FILE_APPEND);
    }
}