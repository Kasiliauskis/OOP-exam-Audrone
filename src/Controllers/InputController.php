<?php

namespace Manta\OopExam\Controllers;

use Manta\OopExam\Repositories\InputRepository;

class InputController
{

    public function __construct(private InputRepository $inputRepository)
    {
    }

    public function qty(): string
    {
        print_r ($this->inputRepository->getByQty('123'));
        die;
    }

    public function price(): string
    {
        return 'price';
    }
}