<?php


namespace gia\models;


class AroundTargetGia extends Gia
{
    public function __construct(int $spendEnergyAmount, array $giaEffects) {
        parent::__construct($spendEnergyAmount, GiaTargetType::Around(), $giaEffects);
    }
}