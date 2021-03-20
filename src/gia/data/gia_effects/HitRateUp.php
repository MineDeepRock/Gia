<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectUpAbility;
use gia\models\player_abilities\HitRate;

class HitRateUp extends GiaEffectUpAbility
{
    const NAME = "HitRateUp";
    const NAME_JP = "命中率アップ";
    const RELATED_ABILITY_NAME = HitRate::NAME;
}