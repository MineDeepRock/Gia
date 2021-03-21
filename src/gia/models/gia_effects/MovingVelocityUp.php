<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectCommandType;
use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\MovingVelocity;

class MovingVelocityUp extends GiaEffectRelatedWithAbility
{
    const NAME = "MovingVelocityUp";
    const NAME_JP = "移動速度アップ";
    const RELATED_ABILITY_NAME = MovingVelocity::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = GiaEffectCommandType::Up();
    }
}