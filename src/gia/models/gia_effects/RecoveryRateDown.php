<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\RecoveryRate;

class RecoveryRateDown  extends GiaEffectRelatedWithAbility
{
    const NAME = "RecoveryRateDown";
    const NAME_JP = "回復速度ダウン";
    const RELATED_ABILITY_NAME = RecoveryRate::NAME;
}