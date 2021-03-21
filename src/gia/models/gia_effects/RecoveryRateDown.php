<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\player_abilities\RecoveryRate;

class RecoveryRateDown  extends AbilityGiaEffect
{
    const NAME = "RecoveryRateDown";
    const NAME_JP = "回復速度ダウン";
    const RELATED_ABILITY_NAME = RecoveryRate::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = AbilityGiaEffectCommandType::Down();
    }
}