<?php

namespace App\Http\Controllers;

/**
 * Controller for a sample route an controller class.
 */
class DiceGame
{
    public function __invoke()
    {
        // $psr17Factory = new Psr17Factory();


        if (!isset($_SESSION["diceGame"])) {
            $data = [
                "header" => "Dice",
                "playerHistory" => [],
                "compHistory" => [],
                "playerSum" => 0,
                "compSum" => 0,
                "playerWon" => false,
                "roundHistory" => [],
                "endMessage" => ""
            ];
        } else {
            $data = $_SESSION["diceGame"]->getData();
            $data["endMessage"] = "";
            if ($data["gameFinished"]) {
                if ($data["playerWon"]) {
                    $data["endMessage"] = "Spelaren vann!";
                } else {
                    $data["endMessage"] = "Du förlorade!";
                }
            }
            // echo "<pre>".var_dump($data)."</pre>";
        }

        // echo "<pre>".var_dump($_SESSION["diceGame"])."</pre>";


        return view('dice', $data);
    }
}
