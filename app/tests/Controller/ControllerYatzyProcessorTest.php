<?php

declare(strict_types=1);

namespace Mos\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Webbprogrammering\Dice\Yatzy;

/**
 * Test cases for the controller Index.
 */
class ControllerYatzyProcessorTest extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerClass()
    {
        $controller = new YatzyProcessor();
        $this->assertInstanceOf("\Mos\Controller\YatzyProcessor", $controller);
    }

    /**
     * Test Throw
     * @runInSeparateProcess
     */
    public function testThrow()
    {
        $controller = new YatzyProcessor();
        $_POST["throwSubmit"] = true;

        $_POST["cube0"] = true;
        $_POST["cube1"] = true;
        $_POST["cube2"] = true;
        $_POST["cube3"] = true;
        $_POST["cube4"] = true;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Test Points
     * @runInSeparateProcess
     */
    public function testPoints()
    {
        $controller = new YatzyProcessor();
        $_SESSION["yatzyGame"] = new Yatzy();
        $_POST["pointsSubmit"] = true;
        $_POST["category"] = "Ones";
        $_POST["points"] = 4;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);

        $check = $_SESSION["yatzyGame"]->getData();
        $this->assertTrue($check["scoreLocked"]["Ones"] == 4);
    }

    /**
     * Test Reset
     * @runInSeparateProcess
     */
    public function testReset()
    {
        $controller = new YatzyProcessor();
        $_SESSION["yatzyGame"] = new Yatzy();
        $_POST["resetSubmit"] = true;

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);

        $this->assertFalse(isset($_SESSION["yatzyGame"]));
    }

    /**
     * Check that the controller returns a response.
     */
    public function testControllerReturnsResponse()
    {
        $controller = new YatzyProcessor();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller();
        $this->assertInstanceOf($exp, $res);
    }
}
