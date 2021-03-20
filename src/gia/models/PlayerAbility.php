<?php


namespace gia\models;


abstract class PlayerAbility
{
    const NAME = "";
    const NAME_JP = "";
    const INITIAL_VALUE = 5;

    private int $value;

    public function __construct() {
        $this->value = static::INITIAL_VALUE;
    }

    public function getAsRate(): float {
        return $this->value / static::INITIAL_VALUE;
    }


    public function up(int $value): void {
        $this->value += abs($value);

        if ($value < 0) $this->value = 0;
        if ($value > 20) $this->value = 20;
    }

    public function down(int $value): void {
        $this->value -= abs($value);

        if ($value < 0) $this->value = 0;
        if ($value > 20) $this->value = 20;
    }
}