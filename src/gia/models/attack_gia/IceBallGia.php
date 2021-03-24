<?php


namespace gia\models\attack_gia;


use gia\models\AttackGia;
use gia\models\gia_effects\MovingVelocityDown;
use gia\models\GiaEffectTargetType;
use gia\models\GiaTargetType;

class IceBallGia extends AttackGia
{
    const NAME = "IceBall";
    protected float $damage = 10;

    public function __construct() {
        $giaEffects = [
            new MovingVelocityDown(2, 5, GiaEffectTargetType::OneEnemy()),
        ];
        parent::__construct(2, GiaTargetType::SingleEnemy(), $giaEffects);
    }
}