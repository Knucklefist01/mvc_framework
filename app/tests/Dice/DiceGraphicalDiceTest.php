<?php

declare(strict_types=1);

namespace Webbprogrammering\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class DiceGraphicalDiceTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateGraphicalDice()
    {
        $controller = new GraphicalDice();
        $this->assertInstanceOf("Webbprogrammering\Dice\GraphicalDice", $controller);
    }

    public function testGetRollFile()
    {
        $dice = new GraphicalDice();
        $dice->roll();

        $correct = "dice" . $dice->getLastRoll() . ".png";
        $check = $dice->getRollFile();

        $this->assertEquals($correct, $check);
    }
}
