<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectCommandType;
use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\EvadeRate;

class EvadeRateDown extends GiaEffectRelatedWithAbility
{
    const NAME = "EvadeRateDown";
    const NAME_JP = "回避率ダウン";
    const RELATED_ABILITY_NAME = EvadeRate::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = GiaEffectCommandType::Down();
    }}