<?php


namespace gia\data\gia_effects;


use gia\data\GiaEffectDownAbility;
use gia\models\player_abilities\RecoveryRate;

class RecoveryRateDown  extends GiaEffectDownAbility
{
    const NAME = "RecoveryRateDown";
    const NAME_JP = "回復速度ダウン";
    const RELATED_ABILITY_NAME = RecoveryRate::NAME;
}