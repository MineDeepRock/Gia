<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectDownAbility;
use gia\models\player_abilities\DefensivePower;

class DefensivePowerDown extends GiaEffectDownAbility
{
    const NAME = "DefensivePowerDown";
    const NAME_JP = "防御力ダウン";
    const RELATED_ABILITY_NAME = DefensivePower::NAME;
}