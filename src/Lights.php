<?php

declare(strict_types=1);

namespace ChristmasLights;

class Lights
{
    private array $lights = [];

    public function __construct(
    ) {
        $this->lights = array_fill(0,10, array_fill(0,10, false));
    }

    public function turnOn(array $startFrom, array $endIn): void
    {
        for ($x = $startFrom[0]; $x <= $endIn[0]; $x++) {
            for ($y = $startFrom[1]; $y <= $endIn[1]; $y++) {
                $this->lights[$x][$y] = true;
            }
        }
    }

    public function lightsOn(): int
    {
        $lightsOn = 0;

        foreach ($this->lights as $rowLights) {
            $lightsOn += array_sum($rowLights);
        }

        return $lightsOn;
    }

    public function toggle(array $startFrom, array $endIn)
    {
        for ($x = $startFrom[0]; $x <= $endIn[0]; $x++) {
            for ($y = $startFrom[1]; $y <= $endIn[1]; $y++) {
                $this->lights[$x][$y] = !$this->lights[$x][$y];
            }
        }
    }
}
