<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use AbstractFactory\View;
use AbstractFactory\LightThemeFactory;
use AbstractFactory\DarkThemeFactory;


class ViewTest extends TestCase
{
    public function testDeveCriarUmaInterfaceGraficaComTemaLight()
    {   
        // $view = new View();
        $view = new View(new LightThemeFactory());
        $this->assertEquals("black", $view->label->color);
        $this->assertEquals("white", $view->button->color);
        $this->assertEquals("blue", $view->button->backgroundColor);
    }

    public function testDeveCriarUmaInterfaceGraficaComTemaDark()
    {   
        $view = new View(new DarkThemeFactory());
        $this->assertEquals("white", $view->label->color);
        $this->assertEquals("white", $view->button->color);
        $this->assertEquals("black", $view->button->backgroundColor);
    }

}