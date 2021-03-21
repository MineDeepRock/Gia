<?php


namespace gia\models;


class SingleTargetGia extends Gia
{
    public function __construct(int $spendEnergyAmount, array $giaEffects) {
        parent::__construct($spendEnergyAmount, GiaTargetType::Single(), $giaEffects);
    }
}