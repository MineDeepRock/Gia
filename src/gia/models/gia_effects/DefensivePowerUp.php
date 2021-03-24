<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\DefensivePower;

class DefensivePowerUp extends AbilityGiaEffect
{
    const NAME = "DefensivePowerUp";
    const NAME_JP = "防御力アップ";
    const RELATED_ABILITY_NAME = DefensivePower::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType, float $range = 0) {
        parent::__construct($value, $seconds, $targetType, $range);
        $this->commandType = AbilityGiaEffectCommandType::Up();
    }
}