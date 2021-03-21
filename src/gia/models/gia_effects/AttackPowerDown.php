<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectCommandType;
use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\AttackPower;

class AttackPowerDown extends GiaEffectRelatedWithAbility
{
    const NAME = "AttackPowerDown";
    const NAME_JP = "攻撃力ダウン";
    const RELATED_ABILITY_NAME = AttackPower::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = GiaEffectCommandType::Down();
    }
}