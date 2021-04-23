<?php

declare(strict_types=1);

namespace Mos\Controller;

use Webbprogrammering\Dice\Game;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Index.
 */
class ControllerDiceGameTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new DiceGame();
        $this->assertInstanceOf("\Mos\Controller\DiceGame", $controller);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testGameNotInSession()
    {
        session_start();

        $controller = new DiceGame();
        $exp = isset($_SESSION["diceGame"]);
        $this->assertFalse($exp);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is stored in session
     * @runInSeparateProcess
     */
    public function testGameInSession()
    {
        session_start();

        $controller = new DiceGame();
        $_SESSION["diceGame"] = new Game();
        $check = $_SESSION["diceGame"]->getData();
        $exp = empty($check);
        $this->assertFalse($exp);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is stored in session
     * @runInSeparateProcess
     */
    public function testPositiveEnd()
    {
        session_start();

        $controller = new DiceGame();
        $_SESSION["diceGame"] = new Game();
        $_SESSION["diceGame"]->setData("gameFinished", true);
        $_SESSION["diceGame"]->setData("playerWon", true);
        $check = $_SESSION["diceGame"]->getData();
        $this->assertTrue($check["playerWon"]);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is stored in session
     * @runInSeparateProcess
     */
    public function testNegativeEnd()
    {
        session_start();

        $controller = new DiceGame();
        $_SESSION["diceGame"] = new Game();
        $_SESSION["diceGame"]->setData("gameFinished", true);
        $_SESSION["diceGame"]->setData("playerWon", false);
        $check = $_SESSION["diceGame"]->getData();
        $this->assertFalse($check["playerWon"]);
        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
