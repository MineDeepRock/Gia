<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\MovingVelocity;

class MovingVelocityUp extends AbilityGiaEffect
{
    const NAME = "MovingVelocityUp";
    const NAME_JP = "移動速度アップ";
    const RELATED_ABILITY_NAME = MovingVelocity::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType) {
        parent::__construct($value, $seconds, $targetType);
        $this->commandType = AbilityGiaEffectCommandType::Up();
    }
}