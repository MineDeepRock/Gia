<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\AttackPower;

class AttackPowerDown extends GiaEffectRelatedWithAbility
{
    const NAME = "AttackPowerDown";
    const NAME_JP = "攻撃力ダウン";
    const RELATED_ABILITY_NAME = AttackPower::NAME;

    public function act($attackPower): void {
        $attackPower->down($this->getValue());
    }

    public function reverse($attackPower):void {
        $attackPower->down($this->getValue());
    }
}