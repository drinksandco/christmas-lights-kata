<?php

declare(strict_types=1);

namespace Test\ChristmasLights;

use PHPUnit\Framework\TestCase;

class LightingTest extends TestCase
{
    public function testTurnsOnEveryLight(): void
    {
        $startFrom = [0,0];
        $endIn = [9,9];

        $lights = new \ChristmasLights\Lights();
        $lights->turnOn($startFrom, $endIn);

        $this->assertSame(100, $lights->lightsOn());
    }

    /** @dataProvider getInputs */
    public function testTogglesFirst1000LightsOnOff(array $initialStartFrom, array $initialEndIn, array $toggleStartFrom, array $toggleEndIn, int $expectedLitLights): void
    {
        $lights = new \ChristmasLights\Lights();
        $lights->turnOn($initialStartFrom, $initialEndIn);
        $lights->toggle($toggleStartFrom, $toggleEndIn);

        $this->assertSame($expectedLitLights, $lights->lightsOn());
    }

    public static function getInputs(): \Generator
    {
        yield 'toggle all lit lights' => [
            [0,0],
            [9,9],
            [0,0],
            [9,0],
            90
        ];
        yield 'toggle 50 lit lights' => [
            [0,0],
            [9,9],
            [0,0],
            [9,4],
            50
        ];
        yield 'toggle 50 lights affecting 1 lit light' => [
            [0,0],
            [0,0],
            [0,0],
            [9,4],
            49
        ];
        yield 'toggle 50 lights without affecting  1 lit light' => [
            [9,9],
            [9,9],
            [0,0],
            [9,4],
            51
        ];
    }
}
