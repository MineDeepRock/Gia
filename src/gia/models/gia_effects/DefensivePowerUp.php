<?php


namespace gia\models\gia_effects;


use gia\models\GiaEffectCommandType;
use gia\models\GiaEffectRelatedWithAbility;
use gia\models\player_abilities\DefensivePower;

class DefensivePowerUp extends GiaEffectRelatedWithAbility
{
    const NAME = "DefensivePowerUp";
    const NAME_JP = "防御力アップ";
    const RELATED_ABILITY_NAME = DefensivePower::NAME;

    public function __construct(int $value, int $seconds) {
        parent::__construct($value, $seconds);
        $this->commandType = GiaEffectCommandType::Up();
    }
}