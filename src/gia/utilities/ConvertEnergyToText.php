<?php


namespace gia\utilities;


use gia\models\Energy;
use pocketmine\utils\TextFormat;

class ConvertEnergyToText
{
    static function execute(Energy $energy): string {
        $value = $energy->getValue();

        $text = "";
        if ($value === $energy->getMaxValue()) {
            $text .= str_repeat(TextFormat::GREEN . "■", $energy->getMaxValue());

        } else if ($value === 0) {
            $text .= str_repeat(TextFormat::WHITE . "■", $energy->getMaxValue());

        } else if ($value > 0) {
            $text .= str_repeat(TextFormat::GREEN . "■", $value);
            $text .= str_repeat(TextFormat::WHITE . "■", $energy->getMaxValue() - $value);
        } else if ($value < 0) {
            $text .= "";
        }

        $text .= TextFormat::RESET . ":";
        $text .= TextFormat::GREEN . "↑↓{$energy->getChangedAmount()}";
        return $text;
    }
}