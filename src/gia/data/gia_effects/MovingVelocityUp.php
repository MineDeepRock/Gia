<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectUpAbility;
use gia\models\player_abilities\MovingVelocity;

class MovingVelocityUp extends GiaEffectUpAbility
{
    const NAME = "MovingVelocityUp";
    const NAME_JP = "移動速度アップ";
    const RELATED_ABILITY_NAME = MovingVelocity::NAME;
}