<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Dice\Yatzy;

/**
 * Controller for a sample route an controller class.
 */
class YatzyGame
{
    public function __invoke()
    {
        if (!isset($_SESSION["yatzyGame"])) {
            $_SESSION["yatzyGame"] = new Yatzy();
        }
        $data = $_SESSION["yatzyGame"]->getData();

        return view('yatzy', $data);
    }
}
