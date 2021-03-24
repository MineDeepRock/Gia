<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\RecoveryRate;

class RecoveryRateDown  extends AbilityGiaEffect
{
    const NAME = "RecoveryRateDown";
    const NAME_JP = "回復速度ダウン";
    const RELATED_ABILITY_NAME = RecoveryRate::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType, float $range = 0) {
        parent::__construct($value, $seconds, $targetType, $range);
        $this->commandType = AbilityGiaEffectCommandType::Down();
    }
}