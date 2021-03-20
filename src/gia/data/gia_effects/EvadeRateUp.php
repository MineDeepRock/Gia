<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectUpAbility;
use gia\models\player_abilities\EvadeRate;

class EvadeRateUp extends GiaEffectUpAbility
{
    const NAME = "EvadeRateUp";
    const NAME_JP = "回避率アップ";
    const RELATED_ABILITY_NAME = EvadeRate::NAME;
}