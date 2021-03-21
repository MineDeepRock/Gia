<?php


namespace gia\utilities;


use gia\models\PlayerAbility;
use pocketmine\utils\TextFormat;

class ConvertAbilityToText
{
    static function execute(PlayerAbility $playerAbility): string {
        $value = $playerAbility->getValue();
        $text = "";
        if ($value === $playerAbility::MAX_VALUE) {
            $text .= str_repeat(TextFormat::GREEN . "■", $playerAbility::MAX_VALUE);

        } else if ($value === 0) {
            $text .= str_repeat(TextFormat::WHITE . "■", $playerAbility::MAX_VALUE);

        } else if ($value > 0) {
            $text .= str_repeat(TextFormat::GREEN . "■", $value);
            $text .= str_repeat(TextFormat::WHITE . "■", $playerAbility::MAX_VALUE - $value);
        } else if ($value < 0) {
            $text .= "";
        }

        $text .= TextFormat::RESET . ":";
        $text .= TextFormat::GREEN . "↑{$playerAbility->getAddedValue()} " . TextFormat::RED . "↓{$playerAbility->getReducedValue()}";
        return $text;
    }
}