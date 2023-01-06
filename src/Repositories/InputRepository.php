<?php

namespace Manta\OopExam\Repositories;

use Manta\OopExam\ElData\Input;

class InputRepository
{

    private  const DATA_FILE = './src/Files/input.json';


    public function getByQty(int $qty): Input
    {
        $data = $this->getDecodedJsonData();
        echo '<pre>';
        foreach ($data as $inputData) {
            if ($inputData['qty'] === $qty) {
                $inputObj = new Input();
                $inputObj->setQty($inputData['qty']);
                $inputObj->setPrice($inputData['price']);
                $inputObj->setTarifas($inputData['tarifas']);
                $inputObj->setMonth($inputData['month']);
            }
        }
        print_r($inputObj);

        die;

    }

    public function getAll(): array
    {
        return[];
    }

    private function getDecodedJsonData(): array
    {
        return json_decode(file_get_contents(self::DATA_FILE), true);
    }

}