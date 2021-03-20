<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectDownAbility;
use gia\models\player_abilities\MovingVelocity;

class MovingVelocityDown extends GiaEffectDownAbility
{
    const NAME = "MovingVelocityDown";
    const NAME_JP = "移動速度ダウン";
    const RELATED_ABILITY_NAME = MovingVelocity::NAME;
}