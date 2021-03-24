<?php


namespace gia\models;


class AttackGia extends Gia
{
    protected float $damage;

    public function getDamage(): float {
        return $this->damage;
    }
}