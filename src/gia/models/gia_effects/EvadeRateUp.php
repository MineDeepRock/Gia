<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\EvadeRate;

class EvadeRateUp extends GiaEffectRelatedWithAbility
{
    const NAME = "EvadeRateUp";
    const NAME_JP = "回避率アップ";
    const RELATED_ABILITY_NAME = EvadeRate::NAME;
}