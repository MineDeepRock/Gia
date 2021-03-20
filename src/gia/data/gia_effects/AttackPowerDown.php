<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectDownAbility;
use gia\models\player_abilities\AttackPower;

class AttackPowerDown extends GiaEffectDownAbility
{
    const NAME = "AttackPowerDown";
    const NAME_JP = "攻撃力ダウン";
    const RELATED_ABILITY_NAME = AttackPower::NAME;
}