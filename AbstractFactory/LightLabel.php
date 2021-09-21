<?php

namespace AbstractFactory;

use AbstractFactory\Label;

class LightLabel implements Label
{
    public string $color;

    public function __construct()
    {
        $this->color = "black";
    }
}