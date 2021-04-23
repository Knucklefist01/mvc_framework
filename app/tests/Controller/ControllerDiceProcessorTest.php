<?php

declare(strict_types=1);

namespace Mos\Controller;

use Webbprogrammering\Dice\Game;
use PHPUnit\Framework\TestCase;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;

/**
 * Test cases for the controller Index.
 */
class ControllerDiceProcessorTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new DiceProcessor();
        $this->assertInstanceOf("\Mos\Controller\DiceProcessor", $controller);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testGameNotInSession()
    {
        session_start();

        $controller = new DiceProcessor();
        $this->assertFalse(isset($_SESSION["diceGame"]));

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testThrowNotFinished()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["amount"] = 2;
        $_POST["throwSubmit"] = true;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testThrowFinished()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["amount"] = 2;
        $_POST["throwSubmit"] = true;
        $_SESSION["diceGame"]->setData("gameFinished", true);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testStopNotFinished()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["stopSubmit"] = true;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testStopFinished()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["stopSubmit"] = true;
        $_SESSION["diceGame"]->setData("gameFinished", true);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testAgainNotFinished()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["againSubmit"] = true;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testAgainFinished()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["againSubmit"] = true;
        $_SESSION["diceGame"]->setData("gameFinished", true);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     * @runInSeparateProcess
     */
    public function testReset()
    {
        session_start();

        $controller = new DiceProcessor();
        $_SESSION["diceGame"] = new Game();
        $_POST["resetSubmit"] = true;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check if game is not stored in session
     */
    public function testControllerReturnsResponse()
    {
        $controller = new DiceProcessor();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
