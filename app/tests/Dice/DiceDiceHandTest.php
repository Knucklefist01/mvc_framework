<?php

declare(strict_types=1);

namespace Webbprogrammering\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class DiceDiceHandTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateDiceHand()
    {
        $controller = new DiceHand();
        $this->assertInstanceOf("Webbprogrammering\Dice\DiceHand", $controller);
    }

    /**
     * Test rolling hand and getting last rolls
     */
    public function testGetRoll()
    {
        $dice = new DiceHand();
        $dice->roll();
        $firstRoll = $dice->dices;
        $firstValues = [];
        foreach ($firstRoll as $singleDice) {
            array_push($firstValues, $singleDice->getLastRoll());
        }
        $getValues = $dice->getLastRoll();
        $this->assertEquals($getValues, $firstValues);
    }
}
