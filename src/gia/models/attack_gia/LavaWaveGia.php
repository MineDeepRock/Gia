<?php


namespace gia\models\attack_gia;


use gia\models\AttackGia;
use gia\models\GiaTargetType;

class LavaWaveGia extends AttackGia
{
    const NAME = "LavaWaveGia";
    const Damage = 5;
    const Range = 8;
    const HitRate = 1.0;

    public function __construct() {
        $giaEffects = [];
        parent::__construct(4, GiaTargetType::AroundEnemy(), $giaEffects);
    }
}