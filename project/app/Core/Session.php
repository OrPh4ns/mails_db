<?php

namespace app\Core;

class Session
{
    public static function managerID()
    {
        return $_SESSION['manager_id']??null;
    }
}
