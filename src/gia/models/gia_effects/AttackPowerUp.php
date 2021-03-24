<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\AttackPower;

class AttackPowerUp extends AbilityGiaEffect
{
    const NAME = "AttackPowerUp";
    const NAME_JP = "攻撃力アップ";
    const RELATED_ABILITY_NAME = AttackPower::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType) {
        parent::__construct($value, $seconds, $targetType);
        $this->commandType = AbilityGiaEffectCommandType::Up();
    }
}