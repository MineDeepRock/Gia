<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\player_abilities\HitRate;

class HitRateUp extends AbilityGiaEffect
{
    const NAME = "HitRateUp";
    const NAME_JP = "命中率アップ";
    const RELATED_ABILITY_NAME = HitRate::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = AbilityGiaEffectCommandType::Up();
    }
}