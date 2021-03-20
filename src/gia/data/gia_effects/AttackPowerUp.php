<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectUpAbility;
use gia\models\player_abilities\AttackPower;

class AttackPowerUp extends GiaEffectUpAbility
{
    const NAME = "AttackPowerUp";
    const NAME_JP = "攻撃力アップ";
    const RELATED_ABILITY_NAME = AttackPower::NAME;
}