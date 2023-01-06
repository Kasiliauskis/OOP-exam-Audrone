<?php

namespace Manta\OopExam\Framework;

use Manta\OopExam\Controllers\HomePageController;
use Manta\OopExam\Controllers\InputController;

class Router
{
    public function __construct(
        private HomePageController $homePageController,
        private InputController $inputController
    ){
    }

    public function process(string $route)
    {
        switch ($route) {
            case '/':
            echo $this->homePageController->renderHomePage();
                break;
            case '/input/info':
                echo $this->inputController->qty();
                break;
            case '/rez/info':
                echo $this->inputController->price();
                break;
            default:
                http_response_code(404);
                echo $this->homePageController->renderNotFoundPage();
                break;
        }
    }
}
