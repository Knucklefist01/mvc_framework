<?php

namespace App\Http\Controllers;

use App\Http\Dice\Dice;
use App\Http\Dice\DiceHand;

/**
 * Controller for a sample route an controller class.
 */
class ThrowProcessor
{
    protected $data = [];

    public function __invoke()
    {
        $single = new Dice();
        $hand = new DiceHand(3);

        $data["singleThrow"] = 0;
        $data["handThrow"] = [0,0,0];

        if (isset($_POST["throw"])) {
            if ($_POST["throw"] == "single") {
                $single->roll();
                $data["singleThrow"] = $single->getLastRoll();
            } else if ($_POST["throw"] == "hand") {
                $hand->roll();
                $data["handThrow"] = $hand->getLastRoll();
            }
        }
        return view('throw', $data);
    }
}
