<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\HitRate;

class HitRateUp extends GiaEffectRelatedWithAbility
{
    const NAME = "HitRateUp";
    const NAME_JP = "命中率アップ";
    const RELATED_ABILITY_NAME = HitRate::NAME;
}