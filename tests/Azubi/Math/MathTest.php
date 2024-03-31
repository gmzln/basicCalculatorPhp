<?php

declare(strict_types=1);

namespace Azubi\tests\Math;

use Azubi\Math\Math;
use Azubi\Math\MathInterface;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * Subject Under Test
     * class that is beeing tested
     */
    private ?MathInterface $sut;

    /**
     * runs before each test method
     * created new fresh instance of math, prevents side effects between tests
     */
    protected function setUp(): void
    {
        $this->sut = new Math();
    }

    /**
     * runs after each test method
     * cleans test environment  and sets to null = clean slate for the next test
     */
    protected function tearDown(): void
    {
        $this->sut = null;
    }

    public function testAdd()
    {
        $this->assertEquals(4.0, $this->sut->add(2.0, 2.0));
        $this->assertEquals(2.0, $this->sut->add(1.0, 1.0));
        $this->assertEquals(3.0, $this->sut->add(1.5, 1.5));
    }

    public function testSubtract()
    {
        $this->assertEquals(3.0, $this->sut->subtract(9.0, 6.0));
        $this->assertEquals(5.0, $this->sut->subtract(15.0, 10.0));
        $this->assertEquals(-3.0, $this->sut->subtract(6.0, 9.0));
    }
    public function testDivide()
    {
        $this->assertEquals(2.0, $this->sut->divide(6.0, 3.0));
        $this->assertEquals(3.0, $this->sut->divide(15.0, 5.0));
        $this->assertEquals(5.0, $this->sut->divide(50.0, 10.0));
    }
    public function testMultiply()
    {
        $this->assertEquals(15.0, $this->sut->multiply(3.0, 5.0));
        $this->assertEquals(1500.0, $this->sut->multiply(15.0, 100.0));
        $this->assertEquals(36.0, $this->sut->multiply(6.0, 6.0));
    }
}
