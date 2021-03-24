<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\AttackPower;

class AttackPowerDown extends AbilityGiaEffect
{
    const NAME = "AttackPowerDown";
    const NAME_JP = "攻撃力ダウン";
    const RELATED_ABILITY_NAME = AttackPower::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType) {
        parent::__construct($value, $seconds, $targetType);
        $this->commandType = AbilityGiaEffectCommandType::Down();
    }
}