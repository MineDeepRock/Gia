<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\AttackPower;

class AttackPowerUp extends GiaEffectRelatedWithAbility
{
    const NAME = "AttackPowerUp";
    const NAME_JP = "攻撃力アップ";
    const RELATED_ABILITY_NAME = AttackPower::NAME;
}