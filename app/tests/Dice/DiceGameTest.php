<?php

declare(strict_types=1);

namespace Webbprogrammering\Dice;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Debug.
 */
class DiceGameTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateGame()
    {
        $controller = new Game();
        $this->assertInstanceOf("Webbprogrammering\Dice\Game", $controller);
    }

    /**
     * Try to get data
     */
    public function testGetData()
    {
        $game = new Game();
        $correctData = [
            "header" => "Dice",
            "playerHistory" => [],
            "compHistory" => [],
            "playerSum" => 0,
            "compSum" => 0,
            "gameFinished" => false,
            "playerWon" => false,
            "roundHistory" => []
        ];
        $checkData = $game->getData();
        $this->assertEquals($correctData, $checkData);
    }

    /**
     * Try to set data
     */
    public function testSetData()
    {
        $game = new Game();
        $game->setData("header", "UnitTesting");
        $checkData = $game->getData();
        $this->assertEquals("UnitTesting", $checkData["header"]);
    }

    /**
     * Check if player has won
     */
    public function testPlayerWon()
    {
        $game = new Game();
        $playerWon = $game->hasPlayerWon();
        $this->assertFalse($playerWon);

        $game->setData("compSum", 22);
        $playerWon = $game->hasPlayerWon();
        $this->assertTrue($playerWon);

        $game->setData("playerSum", 22);
        $playerWon = $game->hasPlayerWon();
        $this->assertFalse($playerWon);

        $game->setData("playerSum", 20);
        $game->setData("compSum", 19);
        $playerWon = $game->hasPlayerWon();
        $this->assertTrue($playerWon);
    }

    /**
     * try to update game
     */
    public function testUpdateGame()
    {
        $game = new Game();
        $game->setData("gameFinished", true);
        $game->setData("compSum", 22);
        $game->updateGame();
        $checkData = $game->getData();
        $this->assertTrue($checkData["playerWon"]);
    }

    /**
     * simulate player stop
     */
    public function testPlayerStopped()
    {
        $game = new Game();
        $game->playerStopped();
        $checkData = $game->getData();
        $this->assertTrue($checkData["gameFinished"]);
    }

    /**
     * simulate Computers Turn
     */
    public function testComputersTurn()
    {
        $game = new Game();
        $game->setData("playerSum", 19);
        $game->computersTurn();

        $checkData = $game->getData();
        $this->assertTrue($checkData["compSum"] > 0);
    }

    /**
     * simulate Computers Turn
     */
    public function testThrowPlayerDice()
    {
        $game = new Game();

        $checkData = $game->getData();
        $this->assertTrue($checkData["playerSum"] == 0);

        $game->throwPlayerDice(2);
        $checkData = $game->getData();
        $this->assertTrue($checkData["playerSum"] > 0);
    }

    /**
     * simulate Computers Turn
     */
    public function testStartNewRound()
    {
        $game = new Game();
        $game->setData("playerSum", 19);
        $game->startNewRound();
        $checkData = $game->getData();
        $this->assertTrue($checkData["playerSum"] == 0);
    }
}
