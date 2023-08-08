<?php

namespace app\Core;

use JetBrains\PhpStorm\NoReturn;

class Controller
{
    /**
     * @param $array
     * @return void
     */
    #[NoReturn] public function jsonReturn($array): void
    {
		header("Content-Type: application/json");
		echo json_encode($array);
		exit;
	}
}
