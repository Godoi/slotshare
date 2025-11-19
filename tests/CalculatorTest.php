<?php

use PHPUnit\Framework\TestCase;
use App\Calculator;
use InvalidArgumentException;

class CalculatorTest extends TestCase
{
    private Calculator $calc;

    protected function setUp(): void
    {
        $this->calc = new Calculator();
    }

    public function testAdd(): void
    {
        $this->assertEquals(5.0, $this->calc->add(2, 3), '2 + 3 should be 5.0');
        $this->assertEquals(-1.0, $this->calc->add(-3, 2), '-3 + 2 should be -1.0');
        $this->assertEquals(0.0, $this->calc->add(0.1, -0.1), '0.1 + (-0.1) should be ~0.0', 0.0001);
    }

    public function testSubtract(): void
    {
        $this->assertEquals(2.0, $this->calc->subtract(5, 3), '5 - 3 should be 2.0');
        $this->assertEquals(-5.0, $this->calc->subtract(-2, 3), '-2 - 3 should be -5.0');
    }

    public function testMultiply(): void
    {
        $this->assertEquals(6.0, $this->calc->multiply(2, 3), '2 * 3 should be 6.0');
        $this->assertEquals(-6.0, $this->calc->multiply(-2, 3), '-2 * 3 should be -6.0');
        $this->assertEquals(0.0, $this->calc->multiply(0, 99), '0 * 99 should be 0.0');
    }

    public function testDivide(): void
    {
        $this->assertEquals(2.0, $this->calc->divide(6, 3), '6 / 3 should be 2.0');
        $this->assertEquals(-2.5, $this->calc->divide(5, -2), '5 / -2 should be -2.5');
    }

    public function testDivideByZeroThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Division by zero');

        $this->calc->divide(1, 0);
    }

    /**
     * @dataProvider powerDataProvider
     */
    public function testPower(int $base, int $exp, int $expected): void
    {
        $this->assertSame($expected, $this->calc->power($base, $exp), "$base^$exp should be $expected");
    }

    public static function powerDataProvider(): array
    {
        return [
            '2^3'       => [2, 3, 8],
            '5^0'       => [5, 0, 1],
            '10^1'      => [10, 1, 10],
            '(-2)^3'    => [-2, 3, -8],
        ];
    }

    public function testFactorial(): void
    {
        $this->assertSame(1, $this->calc->factorial(0), '0! should be 1');
        $this->assertSame(1, $this->calc->factorial(1), '1! should be 1');
        $this->assertSame(120, $this->calc->factorial(5), '5! should be 120');
    }

    public function testFactorialNegativeThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Non-negative integer required');

        $this->calc->factorial(-1);
    }
}