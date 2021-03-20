<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectDownAbility;
use gia\models\player_abilities\HitRate;

class HitRateDown extends GiaEffectDownAbility
{
    const NAME = "HitRateDown";
    const NAME_JP = "命中率ダウン";
    const RELATED_ABILITY_NAME = HitRate::NAME;
}