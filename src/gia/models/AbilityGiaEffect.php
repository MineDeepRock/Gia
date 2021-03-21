<?php


namespace gia\models;


abstract class AbilityGiaEffect extends GiaEffect
{
    protected AbilityGiaEffectCommandType $commandType;

    public function act(PlayerAbility $ability) {
        if ($this->commandType->equals(AbilityGiaEffectCommandType::Up())) {
            $ability->up($this->getValue());
        } else if ($this->commandType->equals(AbilityGiaEffectCommandType::Down())) {
            $ability->down($this->getValue());
        }
    }

    public function reverse(PlayerAbility $ability) {
        if ($this->commandType->equals(AbilityGiaEffectCommandType::Up())) {
            $ability->down($this->getValue(), true);
        } else if ($this->commandType->equals(AbilityGiaEffectCommandType::Down())) {
            $ability->up($this->getValue(), true);
        }
    }
}