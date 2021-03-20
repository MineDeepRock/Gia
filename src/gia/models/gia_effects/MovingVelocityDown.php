<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\MovingVelocity;

class MovingVelocityDown extends GiaEffectRelatedWithAbility
{
    const NAME = "MovingVelocityDown";
    const NAME_JP = "移動速度ダウン";
    const RELATED_ABILITY_NAME = MovingVelocity::NAME;
}