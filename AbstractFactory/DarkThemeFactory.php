<?php

namespace AbstractFactory;

use AbstractFactory\AbstractFactory;
use AbstractFactory\DarkLabel;
use AbstractFactory\DarkButton;

class DarkThemeFactory implements AbstractFactory
{
    public function createLabel()
    {
        return new DarkLabel();
    }

    public function createButton()
    {
        return new DarkButton();
    }
}