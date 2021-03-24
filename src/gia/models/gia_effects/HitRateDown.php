<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\HitRate;

class HitRateDown extends AbilityGiaEffect
{
    const NAME = "HitRateDown";
    const NAME_JP = "命中率ダウン";
    const RELATED_ABILITY_NAME = HitRate::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType, float $range = 0) {
        parent::__construct($value, $seconds, $targetType, $range);
        $this->commandType = AbilityGiaEffectCommandType::Down();
    }

}