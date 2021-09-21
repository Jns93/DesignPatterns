<?php

namespace AbstractFactory;

use AbstractFactory\AbstractFactory;
use AbstractFactory\LightLabel;
use AbstractFactory\LightButton;

class LightThemeFactory implements AbstractFactory
{
    public function createLabel()
    {
        return new LightLabel();
    }

    public function createButton()
    {
        return new LightButton();
    }
}