<?php

namespace Manta\OopExam\ElData;

class Input
{
    private int $qty;
    private int $price;
    private int $tarifas;
    private string $month;

    public function setQty(string $qty): int
    {
        $this->qty = $qty;

        return $qty;
    }

    public function setPrice(string $price): int
    {
        $this->price = $price;
    }

    public function setTarifas(string $tarifas): void
    {
        $this->tarifas = $tarifas;
    }

    public function setMonth(int $month): string
    {
        $this->month = $month;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getRate(): int
    {
        return $this->tarifas;
    }

    public function getMonth(): string
    {
        return $this->month;
    }



}