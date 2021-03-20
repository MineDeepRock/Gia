<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectUpAbility;
use gia\models\player_abilities\DefensivePower;

class DefensivePowerUp extends GiaEffectUpAbility
{
    const NAME = "DefensivePowerUp";
    const NAME_JP = "防御力アップ";
    const RELATED_ABILITY_NAME = DefensivePower::NAME;
}