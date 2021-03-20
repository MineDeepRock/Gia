<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectUpAbility;
use gia\models\player_abilities\RecoveryRate;

class RecoveryRateUp  extends GiaEffectUpAbility
{
    const NAME = "RecoveryRateUp";
    const NAME_JP = "回復速度アップ";
    const RELATED_ABILITY_NAME = RecoveryRate::NAME;
}