<?php


namespace gia\models\attack_gia;


use gia\models\AttackGia;
use gia\models\GiaTargetType;

class FireBallGia extends  AttackGia
{
    const NAME = "FireBall";
    const Damage = 5;
    const HitRate = 1.0;

    public function __construct() {
        $giaEffects = [];
        parent::__construct(2, GiaTargetType::SingleEnemy(), $giaEffects);
    }
}