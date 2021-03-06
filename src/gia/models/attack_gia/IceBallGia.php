<?php


namespace gia\models\attack_gia;


use gia\models\AttackGia;
use gia\models\gia_effects\MovingVelocityDown;
use gia\models\GiaEffectTargetType;
use gia\models\GiaTargetType;

class IceBallGia extends AttackGia
{
    const NAME = "IceBall";
    const Damage = 4;
    const HitRate = 1.0;

    public function __construct() {
        $giaEffects = [
            new MovingVelocityDown(2, 5, GiaEffectTargetType::Enemy()),
        ];
        parent::__construct(2, GiaTargetType::SingleEnemy(), $giaEffects);
    }
}