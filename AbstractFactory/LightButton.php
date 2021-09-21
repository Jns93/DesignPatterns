<?php

namespace AbstractFactory;

use AbstractFactory\Button;

class LightButton implements Button
{
    public string $color;
    public string $backgroundColor;

    public function __construct()
    {
        $this->color = "white";
        $this->backgroundColor = "blue";
    }
}