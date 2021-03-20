<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\RecoveryRate;

class RecoveryRateUp  extends GiaEffectRelatedWithAbility
{
    const NAME = "RecoveryRateUp";
    const NAME_JP = "回復速度アップ";
    const RELATED_ABILITY_NAME = RecoveryRate::NAME;
}