<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectCommandType;
use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\HitRate;

class HitRateDown extends GiaEffectRelatedWithAbility
{
    const NAME = "HitRateDown";
    const NAME_JP = "命中率ダウン";
    const RELATED_ABILITY_NAME = HitRate::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = GiaEffectCommandType::Down();
    }

}