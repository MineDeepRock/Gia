<?php


namespace gia\models;


abstract class PlayerAbility
{
    const NAME = "";
    const NAME_JP = "";
    const MAX_VALUE = 20;
    const MINIMUM_VALUE = 0;
    const INITIAL_VALUE = 5;

    private int $value;
    private int $addedValue = 0;
    private int $reducedValue = 0;

    public function __construct() {
        $this->value = static::INITIAL_VALUE;
    }

    public function getAsRate(): float {
        return $this->value / static::INITIAL_VALUE;
    }


    //TODO:asReverseで判断
    public function up(int $value, bool $asReverse = false): void {
        if ($asReverse) {
            $this->reducedValue -= abs($value);
        } else {
            $this->addedValue += abs($value);
        }

        $this->value = $this->addedValue - $this->reducedValue;
        if ($this->value > static::MAX_VALUE) $this->value = static::MAX_VALUE;
        if ($this->value < static::MINIMUM_VALUE) $this->value = static::MINIMUM_VALUE;
    }

    public function down(int $value, bool $asReverse = false): void {
        if ($asReverse) {
            $this->addedValue -= abs($value);
        } else {
            $this->reducedValue += abs($value);
        }

        $this->value = $this->addedValue - $this->reducedValue;
        if ($this->value > static::MAX_VALUE) $this->value = static::MAX_VALUE;
        if ($this->value < static::MINIMUM_VALUE) $this->value = static::MINIMUM_VALUE;
    }

    /**
     * @return int
     */
    public function getAddedValue(): int {
        return $this->addedValue;
    }

    /**
     * @return int
     */
    public function getReducedValue(): int {
        return $this->reducedValue;
    }
}