<?php

namespace app\Core;

class Site
{
    public static function URL(): string
    {
        return trim(getenv('ROOTURL'));
    }

    public static function Redirect(string $path): void
    {
        header('Location: /'.Site::URL().'/'.$path);
    }
}
