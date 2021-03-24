<?php


namespace gia\models\attack_gia;


use gia\models\AttackGia;
use gia\models\gia_effects\MovingVelocityDown;
use gia\models\GiaEffectTargetType;
use gia\models\GiaTargetType;

class IceStalactiteGia extends AttackGia
{
    const NAME = "IceStalactite";
    const Damage = 5;
    const Range = 8;

    public function __construct() {
        $giaEffects = [
            new MovingVelocityDown(1, 3, GiaEffectTargetType::Enemies()),
        ];
        parent::__construct(4, GiaTargetType::AroundEnemy(), $giaEffects);
    }
}