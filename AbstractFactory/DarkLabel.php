<?php

namespace AbstractFactory;

use AbstractFactory\Label;

class DarkLabel implements Label
{
    public string $color;

    public function __construct()
    {
        $this->color = "white";
    }
}