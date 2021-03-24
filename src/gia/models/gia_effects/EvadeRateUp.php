<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\EvadeRate;

class EvadeRateUp extends AbilityGiaEffect
{
    const NAME = "EvadeRateUp";
    const NAME_JP = "回避率アップ";
    const RELATED_ABILITY_NAME = EvadeRate::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType) {
        parent::__construct($value, $seconds, $targetType);
        $this->commandType = AbilityGiaEffectCommandType::Up();
    }
}