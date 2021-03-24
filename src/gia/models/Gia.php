<?php


namespace gia\models;


class Gia
{
    const NAME = "";
    const NAME_JP = "";
    protected int $spendEnergyAmount;
    protected GiaTargetType $giaTargetType;
    protected array $giaEffects;

    public function __construct(int $spendEnergyAmount, GiaTargetType $giaTargetType, array $giaEffects) {
        $this->spendEnergyAmount = $spendEnergyAmount;
        $this->giaTargetType = $giaTargetType;
        $this->giaEffects = $giaEffects;
    }

    /**
     * @return int
     */
    public function getSpendEnergyAmount(): int {
        return $this->spendEnergyAmount;
    }

    /**
     * @return GiaTargetType
     */
    public function getGiaTargetType(): GiaTargetType {
        return $this->giaTargetType;
    }

    /**
     * @return array
     */
    public function getGiaEffects(): array {
        return $this->giaEffects;
    }
}