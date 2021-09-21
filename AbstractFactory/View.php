<?php

namespace AbstractFactory;

// use AbstractFactory\LightLabel;
// use AbstractFactory\LightButton;
use AbstractFactory\Label;
use AbstractFactory\Button;
use AbstractFactory\AbstractFactory;

class View 
{
    public $label;
    public $button;

    // public function __construct()
    // {
    //     $this->label = new LightLabel();
    //     $this->button = new LightButton();
    // }

    //Implementando a fabrica
    public function __construct(AbstractFactory $themeFactory)
    {
        $this->label = $themeFactory->createLabel();
        $this->button = $themeFactory->createButton();
    }
}