<?php


namespace gia\models;


abstract class GiaEffectRelatedWithAbility extends GiaEffect
{
    private GiaEffectCommandType $commandType;

    public function act(PlayerAbility $ability) {
        if ($this->commandType->equals(GiaEffectCommandType::Up())) {
            $ability->up($this->getValue());
        } else if ($this->commandType->equals(GiaEffectCommandType::Down())) {
            $ability->down($this->getValue());
        }
    }

    public function reverse(PlayerAbility $ability) {
        if ($this->commandType->equals(GiaEffectCommandType::Up())) {
            $ability->down($this->getValue(), true);
        } else if ($this->commandType->equals(GiaEffectCommandType::Down())) {
            $ability->up($this->getValue(), true);
        }
    }
}