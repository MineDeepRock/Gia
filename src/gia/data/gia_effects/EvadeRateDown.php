<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectDownAbility;
use gia\models\player_abilities\EvadeRate;

class EvadeRateDown extends GiaEffectDownAbility
{
    const NAME = "EvadeRateDown";
    const NAME_JP = "回避率ダウン";
    const RELATED_ABILITY_NAME = EvadeRate::NAME;
}