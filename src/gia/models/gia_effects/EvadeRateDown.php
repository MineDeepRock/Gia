<?php


namespace gia\models\gia_effects;


use gia\models\AbilityGiaEffectCommandType;
use gia\models\AbilityGiaEffect;
use gia\models\GiaEffectTargetType;
use gia\models\player_abilities\EvadeRate;

class EvadeRateDown extends AbilityGiaEffect
{
    const NAME = "EvadeRateDown";
    const NAME_JP = "回避率ダウン";
    const RELATED_ABILITY_NAME = EvadeRate::NAME;

    public function __construct(int $value, int $seconds, GiaEffectTargetType $targetType) {
        parent::__construct($value, $seconds, $targetType);
        $this->commandType = AbilityGiaEffectCommandType::Down();
    }}