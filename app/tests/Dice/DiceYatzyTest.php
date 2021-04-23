<?php

declare(strict_types=1);

namespace Webbprogrammering\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class DiceYatzyTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateYatzy()
    {
        $controller = new Yatzy();
        $this->assertInstanceOf("Webbprogrammering\Dice\Yatzy", $controller);
    }

    /**
     * Test getting data
     */
    public function testGetData()
    {
        $yatzy = new Yatzy();
        $correct = [
            "header" => "Yatzy Game",
            "scoreCategories" => [
                "Ones",
                "Twos",
                "Threes",
                "Fours",
                "Fives",
                "Sixes",

                "Sum",
                "Bonus",

                "Three of a kind",
                "Four of a kind",
                "Full House",
                "Small straight",
                "Large straight",
                "Chance",
                "YAHTZEE"
            ],
            "scoreLocked" => [
                "Sum" => 0,
                "Bonus" => 0
            ],
            "scoreOptions" => [],
            "scoreTotal" => 0,
            "jsFunctions" => [
                "exampleJS" => ["param1","param2","param3"]
            ],
            "hand" => [
                0 => 1,
                1 => 2,
                2 => 3,
                3 => 4,
                4 => 5
            ],
            "lastKept" => [],
            "throws" => 0
        ];
        $check = $yatzy->getData();
        $this->assertEquals($correct, $check);
    }

    /**
     * Test picking points
     */
    public function testPickingPoints()
    {
        $yatzy = new Yatzy();

        $yatzy->pickPoints("Ones", 4);
        $check = $yatzy->getData();
        $this->assertEquals($check["scoreLocked"]["Ones"], 4);
    }

    /**
     * Test getting a bonus
     */
    public function testBonus()
    {
        $yatzy = new Yatzy();

        $yatzy->pickPoints("Ones", 4);
        $yatzy->pickPoints("Twos", 4);
        $yatzy->pickPoints("Threes", 6);
        $yatzy->pickPoints("Fours", 12);
        $yatzy->pickPoints("Fives", 20);
        $yatzy->pickPoints("Sixes", 18);
        $check = $yatzy->getData();
        $this->assertEquals($check["scoreLocked"]["Bonus"], 35);
    }

    /**
     * Test throwing dice
     */
    public function testThrowDice()
    {
        $yatzy = new Yatzy();

        $yatzy->throwDice([]);
        $check = $yatzy->getData();
        $this->assertEquals(1, $check["throws"]);

        $yatzy->throwDice([0,1,4]);
        $check = $yatzy->getData();
        $this->assertEquals([0,1,4], $check["lastKept"]);
    }

    /**
     * Test calculating options
     */
    public function testCalcOptions()
    {
        $yatzy = new Yatzy();


        $yatzy->setData("hand", [
            0 => 1,
            1 => 1,
            2 => 2,
            3 => 2,
            4 => 3
        ]);
        $yatzy->calcOptions();

        // Checks Ones, Twos, Threes
        $check = $yatzy->getData();
        $this->assertEquals(2, $check["scoreOptions"]["Ones"]);
        $this->assertEquals(4, $check["scoreOptions"]["Twos"]);
        $this->assertEquals(3, $check["scoreOptions"]["Threes"]);


        $yatzy->setData("hand", [
            0 => 4,
            1 => 4,
            2 => 5,
            3 => 5,
            4 => 6
        ]);
        $yatzy->calcOptions();

        // Checks Fours, Fives, Sixes
        $check = $yatzy->getData();
        $this->assertEquals(8, $check["scoreOptions"]["Fours"]);
        $this->assertEquals(10, $check["scoreOptions"]["Fives"]);
        $this->assertEquals(6, $check["scoreOptions"]["Sixes"]);


        $yatzy->setData("hand", [
            0 => 1,
            1 => 1,
            2 => 1,
            3 => 2,
            4 => 3
        ]);
        $yatzy->calcOptions();

        // Checks three of a kind
        $check = $yatzy->getData();
        $this->assertEquals(8, $check["scoreOptions"]["Three of a kind"]);


        $yatzy->setData("hand", [
            0 => 1,
            1 => 1,
            2 => 1,
            3 => 2,
            4 => 2
        ]);
        $yatzy->calcOptions();

        // Checks Full House (and Three of a kind)
        $check = $yatzy->getData();
        $this->assertEquals(25, $check["scoreOptions"]["Full House"]);


        $yatzy->setData("hand", [
            0 => 1,
            1 => 1,
            2 => 1,
            3 => 1,
            4 => 2
        ]);
        $yatzy->calcOptions();

        // Four of a kind
        $check = $yatzy->getData();
        $this->assertEquals(6, $check["scoreOptions"]["Four of a kind"]);


        $yatzy->setData("hand", [
            0 => 1,
            1 => 1,
            2 => 1,
            3 => 1,
            4 => 1
        ]);
        $yatzy->calcOptions();

        // YAHTZEE
        $check = $yatzy->getData();
        $this->assertEquals(50, $check["scoreOptions"]["YAHTZEE"]);
    }
}
